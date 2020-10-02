function check_cms() {
    var wl, kwl;

    if ($("#site_list").attr("value") == "")
        alert("Не введены сайты для проверки !");
    else {
        var url = $("#site_list").val().split(/[\n\r\s* ]+/);
        wl = url.length;
        if (wl <= 10) {

            $("#cms").fadeOut(function () {

                $("#show_cms").html("<tr bgcolor='#dfecfd'><td>Сайт</td><td>CMS</td></tr>");

                kwl = 0;
                for (var i = 0; i < wl; i++) {
                    if ($.trim(url[i]) != "") {
                        kwl++;
                        $("#show_cms").append("<tr><td>" + url[i] + "</td><td id='cms_" + i + "'><img src='ajax-loader.gif'></td></tr>");
                    }
                }
                $("#show_cms").append("<tr><td><a onclick='$(\"#show_cms\").fadeOut( function() { $(\"#cms\").fadeIn(); $(\"#site_list\").focus(); });' style='text-decoration:underline;'>к списку сайтов</a></td><td></td></tr>");

                $("#show_cms").fadeIn();

                for (var i = 0; i < wl; i++) {
                    if ($.trim(url[i]) != "")
                        show_cms_result(i, url[i], kwl);
                }
            });
        } else alert("Ограничение в 10 сайтов.");
    }

}

function show_cms_result(i, site, kwl) {
    $.post("cms.php", {url: site}, function (data) {
        $("#cms_" + i).html(data);
        if (kwl == i + 1)
            alert("Определение CMS завершено.");
    });
}
