$(document).ready(function() {
    url = "../includes/datefeed-test-1.inc";
    console.log("Hellowoow");
    $.ajax({
        url: url, success: function(result) {
            $("#rss").html(result);
        }
    });
});