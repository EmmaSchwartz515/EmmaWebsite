class Task {
    text = "Task Text";
    tags = [];
    id = "";
}

var USER_username = ""; // USER DATA

var USER_tags_points = new Map(); // USER DATA

var USER_tasks_completed = []; // USER DATA


// TODO : Confetti after each task completion
// TODO : Leaderboard
// TODO : Update data online

var counter = document.getElementById("counter");
var curr_task = document.getElementById("currtask");
var username_holder = document.getElementById("username");


var tasks = [];

function makeTask(text, tags) {
    var task = new Task;
    task.text = text;
    task.tags = tags;

    for (const tag of tags) {
        if (!USER_tags_points.has(tag)) {
            USER_tags_points.set(tag, 0);
        }
    }

    tasks.push(task);
}

function populateTasks() {
    const xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var table = JSON.parse(this.responseText);
            for (var i = 0; i < table.length; i++) {
                var tagsArray = table[i].tags.split(",");

                makeTask(table[i].text, tagsArray);
                
                giveTask();
            }
        }
    }

    xhttp.open("GET", './query.php?table=tasks', true);
    xhttp.send();
}

var favor_out_of_comfort_zone = true;

var currentTask = new Task;

function getBestTag(lowestOrHighest) { // -1 for lowest, 1 for highest
    var curr = -1;
    var curr_tag = "";

    
    for (const [tag, tag_points] of USER_tags_points) {
        if (curr == -1 || lowestOrHighest * tag_points > lowestOrHighest * curr) {
            curr = tag_points;
            curr_tag = tag;
        }
    }
    
    return curr_tag;
}

function getTasksFromTag(tag) {
    for (const task of tasks) {
        if (task.tags.includes(tag)) {
            return task;
        }
    }

    return tasks[0];
}

function giveTask() {
    var favored_tag;
    
    if (favor_out_of_comfort_zone) {
        favored_tag = getBestTag(-1); // get tag with lowest points
    } else {
        favored_tag = getBestTag(1); // get tag with lowest points
    }

    tasks.splice(tasks.indexOf(currentTask), 1);

    currentTask = getTasksFromTag(favored_tag);

    if (currentTask == null) {
        console.error("Error at line 97: Current Task is Null!");
    } else {
        curr_task.textContent = currentTask.text;
    }
}

function completed() {
    for (const tag of currentTask.tags) {
        USER_tags_points.set(tag, USER_tags_points.get(tag) + 1);
    }

    USER_tasks_completed.push(currentTask);

    counter.textContent = USER_tasks_completed.length;

    updateLeaderboard();

    saveData();

    giveTask();
}

function notCompleted() {
    for (const tag of currentTask.tags) {
        USER_tags_points.set(tag, USER_tags_points.get(tag) + 0.25);
    }

    updateLeaderboard();

    saveData();

    giveTask();
}

function updateLeaderboard() {

    if (USER_tags_points.keys().length == 0) {return}

    for (const tag of USER_tags_points.keys()) {
        console.log(tag, USER_tags_points.get(tag))
    }
}

function getData(username) {
    const xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var table = JSON.parse(this.responseText);

            for (var i = 0; i < table.length; i++) {
                var user = table[i].username;

                if (user == username) {
                    console.log("Found user!");

                    USER_username = user;

                    USER_tags_points = new Map(Object.entries(JSON.parse(table[i].tags_points)));
                    updateLeaderboard();

                    USER_tasks_completed = JSON.parse(table[i].tags_points);

                    for (task in USER_tasks_completed) {
                        tasks.splice(tasks.indexOf(task), 1);
                    }

                    counter.textContent = USER_tasks_completed.length;

                    return;
                }
            }

            console.log("Could not find user.");
        }
    }

    xhttp.open("GET", './query.php?table=user_data', true);
    xhttp.send();
}

function getUsername() {
    if (username_holder.textContent == "") {
        window.setTimeout(getUsername, 1);
    } else {
        return username_holder.textContent;
    }
}

function saveData() {
    // Put data into JSON
    const arrayToSerialize = [];
    USER_tags_points.forEach((value, key) => arrayToSerialize.push([key, value]));
    const tags_points_json = JSON.stringify(arrayToSerialize);

    const tasks_completed_json = JSON.stringify(USER_tasks_completed);

    // xhhtp put data into PHP
    const xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    }

    var url = './updateuser.php?user=' + USER_username + "&tags_points=" + tags_points_json + "&tasks_completed="
        + tasks_completed_json;
    
    console.log(url);

    xhttp.open("GET", url, true);
    xhttp.send();
}

function setup() {
    var username = getUsername().trim();

    if (username == undefined) {
        console.error("Username not defined!");
        return;
    }

    console.log(username);

    getData(username);

    populateTasks();
}

setup();