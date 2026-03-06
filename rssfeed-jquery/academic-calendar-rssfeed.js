$(document).ready(function() {
    url = "https://25livepub.collegenet.com/calendars/csuci-calendar-of-events.json?filterview=AcademicsResearchandCommunity&filter1=_Academics+%26+Research_Community_&filterfield1=23227"
    $.ajax({
        url: url, success: function(result) {
            var cacheString = "";
            var i = 0;
            var maxItems = 4;
            for (var item of result) {
                if (i >= maxItems) {
                    break;
                }
                i++;
                console.log(item);
                var title = item.title;
                var startDateTime = item.startDateTime;
                var link = item.permaLinkUrl;

                var date = new Date(startDateTime);

                var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"]


                var pubDate = monthNames[date.getMonth()] + " " + date.getDay();
                var timeDate = date.toISOString().split('T')[0];

                // <![CDATA[
                    cacheString += "<li><a href=";
                    cacheString += "\"" + link + "\">";
                    cacheString += "<time datetime=\"";
                    cacheString += timeDate;
                    cacheString += "\" class=\"dates__date\">";
                    cacheString += pubDate;
                    cacheString += "</time>";
                    cacheString += title;
                    cacheString += "</a>\n</li>"
                // ]]>
            }

            $("#rss").html(cacheString);
        }
    });
});