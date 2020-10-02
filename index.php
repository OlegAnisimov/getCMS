<?php
echo
<<<HTML
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Определение CMS</title>
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="light.js" ></script>
</head>
<body onload="$('#site_list').focus()">

<div class='tabs' id='whois_tab'>

<table border="1" width="100%" cellpadding="10px" cellspacing="0" bordercolor="#4d77a0" style="-moz-border-radius: 10px; -webkit-border-radius: 10px; border-radius: 10px;" rules="none">

<tr>
<td valign="top">

<form id='cms' action='' method='post'>
    Список сайтов:<br><br>
<textarea id='site_list' style='width:500px; height:300px'></textarea><br><br>
<input type='button' value='Определить' onclick='check_cms();'>     <input type='reset' value='Очистить' onclick='$(\"#site_list\").focus();'>
</form>

<table width='100%' border='1' bordercolor='lightblue' style='BORDER-COLLAPSE: collapse; display: none;' id='show_cms' cellpadding=\"3\"></table>

</td>
</tr>
</table>

</div>
</body>
</html> 
HTML;




