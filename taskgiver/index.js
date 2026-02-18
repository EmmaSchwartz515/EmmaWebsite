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
}

function giveTask() {
    var favored_tag;
    
    if (favor_out_of_comfort_zone) {
        favored_tag = getBestTag(-1); // get tag with lowest points
    } else {
        favored_tag = getBestTag(1); // get tag with lowest points
    }

    currentTask = getTasksFromTag(favored_tag);

    if (currentTask == null) {
        console.error("Error at line 97");
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

    console.log(USER_tags_points, USER_tasks_completed);

    giveTask();
}

function notCompleted() {
    for (const tag of currentTask.tags) {
        USER_tags_points.set(tag, USER_tags_points.get(tag) + 0.25);
    }

    updateLeaderboard();

    giveTask();
}

function updateLeaderboard() {
    saveData();

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
                    USER_username = user;

                    USER_tags_points = new Map(Object.entries(JSON.parse(table[i].tags_points)));
                    updateLeaderboard();

                    USER_tasks_completed = JSON.parse(table[i].tags_points);
                    counter.textContent = USER_tasks_completed.length;
                }
            }
        }
    }

    xhttp.open("GET", './query.php?table=user_data', true);
    xhttp.send();
}

function getUsername() {
    const xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            return this.responseText;
        }
    }

    xhttp.open("GET", './getuser.php', true);
    xhttp.send();
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

    var url = './updateuser.php?user=' + USER_username + "&tags_points=" + tags_points_json + "&tasks_completed=" + tasks_completed_json

    xhttp.open("POST", url, true);
    xhttp.send();

    // PHP put data into SQL
}

username = getUsername();

getData(username);

populateTasks();