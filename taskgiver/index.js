class Task {
    text = "Task Text";
    tags = [];
    id = "";
}

var tags_points = new Map();

var counter = document.getElementById("counter");
var curr_task = document.getElementById("currtask");

var tasks_completed = 0;

var tasks = [];

function makeTask(text, tags) {
    var task = new Task;
    task.text = text;
    task.tags = tags;

    for (const tag of tags) {
        tags_points.set(tag, 0);
    }
    return task;
}

function populateTasks() {
    tasks.push(makeTask("Go to the grocery store", ["in-person", "care", "shop"]));
    tasks.push(makeTask("Go to the mall", ["in-person", "shop"]));
    tasks.push(makeTask("Go to the diner", ["in-person", "shop"]));
    tasks.push(makeTask("Go to the game store", ["in-person", "game", "shop"]));
    tasks.push(makeTask("Go to the library", ["in-person", "chill"]));
    tasks.push(makeTask("Play webfishing", ["online", "game", "chill", "shop"]));
    tasks.push(makeTask("Go on this minecraft server", ["online", "game"]));
    tasks.push(makeTask("Go to this website", ["online", "web"]));
}

var favor_out_of_comfort_zone = true;

var currentTask = new Task;

function getBestTag(lowestOrHighest) { // -1 for lowest, 1 for highest
    var curr = -1;
    var curr_tag = "";

    
    for (const [tag, tag_points] of tags_points) {
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
    console.log(tags_points);

    var favored_tag;
    
    if (favor_out_of_comfort_zone) {
        favored_tag = getBestTag(-1); // get tag with lowest points
    } else {
        favored_tag = getBestTag(1); // get tag with lowest points
    }

    currentTask = getTasksFromTag(favored_tag);

    curr_task.textContent = currentTask.text;

    console.log(favored_tag);
}

function completed() {
    for (const tag of currentTask.tags) {
        console.log(tag);
        tags_points.set(tag, tags_points.get(tag) + 1);
    }

    giveTask();

    tasks_completed++;

    counter.textContent = tasks_completed;
}

function notCompleted() {
    for (const tag of currentTask.tags) {
        console.log(tag);
        tags_points.set(tag, tags_points.get(tag) + 0.25);
    }

    giveTask();

    tasks_completed++;

    counter.textContent = tasks_completed;
}

populateTasks();

giveTask()