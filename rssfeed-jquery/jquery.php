<?php
    $maxlen = -1;

    if (isset($_POST)) {
        $maxlen = $_POST["maxlen"];
    }
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<ul class="block-list" id="rss">
    
</ul>
<script type="text/javascript">
    $(document).ready(function() {
        url = "https://www.trumba.com/calendars/csuci-academic-calendar.json"
        $.ajax({
            url: url, success: function(result) {
                var cacheString = "";
                let i = 0;
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
</script>
