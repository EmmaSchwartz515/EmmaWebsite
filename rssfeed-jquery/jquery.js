$(document).ready(function() {
    $("#rss").click(function() {
        url = "https://www.trumba.com/calendars/csuci-academic-calendar.rss"
        $.ajax({
            url: url, success: function() {
                $("#rss").html(JSON.stringify(result, 4));
            }
        });
    });
});