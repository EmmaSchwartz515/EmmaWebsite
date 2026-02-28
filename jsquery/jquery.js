$(document).ready(function() {
    // On clicking green recatngle
    $("#about").click(function() {
        if ($(this).html() === "You clicked me!") {
            $(this).html("clicked me again loser!");
        } else {
            $(this).html("You clicked me!");
        }
    });

    // Hover and unhover of green ractangle
    $("#about").hover(function() {
        $(this).css("background-color",'lightblue');
    });

    $("#about").mouseleave(function() {
        $(this).css('background-color','lightgreen');
    });

    // Rectangle controls
    $("#show").click(function() {
        $('#about').show();
    });

    $("#hide").click(function() {
        $('#about').hide();
    });

    $("#toggle").click(function() {
        $('#about').toggle();
    });

    // Rectangle text
    $(".power").keyup(function() {
        $("#about").html($(this).val());
    });

    $("#getjson").click(function() {
        $.ajax({url: 'students.json', success: function(result) {
            $("#about").html(JSON.stringify(result, 4));
        }});
    });

    $("#getstudent").click(function() {
        $.ajax({url: 'students.json', success: function(result) {
            var studentName = $(".power").val();
            var resultingStudents = [];
            for (var student of result.students) {
                if (student.name.toLowerCase().indexOf(studentName.toLowerCase()) != -1) {
                    resultingStudents.push(student);
                }
            }

            var str = "";

            for (var resultingStudent of resultingStudents) {
                str += "Name: " + resultingStudent.name + "<br />ID: " + resultingStudent.id + "<br />Major: " + resultingStudent.major + "<br /><br />"
            }

            if (str === "") {
                str = "No results found.";
            }

            $("#about").html(str);
        }});
    });
});