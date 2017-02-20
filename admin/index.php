<?php
include("lock.php");
include("\blocks\bd.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <title>Админский блок</title>
        <link href="css/style.css" type="text/css" rel="stylesheet">
    </head>
    <body>     
        <table id="wrapper" >
            <!--Шапка сайта-->
            <?php include("\blocks\header.php");?>
		    <!--Меню сайта-->
	     <tr id="menu_and_content">
                <?php include("\blocks\menu.php");?>
                <td id="content">
                <div id="content_top"></div>
                <div id="content_center">
                
                <h1 >Добро пожаловать в админский блок</h1>
                <h3 >Статистика</h3>
                <?php
                    $result10= mysql_query("SELECT COUNT(*)FROM data",$db);
                    $sum = mysql_fetch_array($result10);
                    echo "<p id='forms'>Уроков в базе: $sum[0]</p>";
                
                    $result11= mysql_query("SELECT COUNT(*)FROM comments",$db);
                    $sum1 = mysql_fetch_array($result11);
                    echo "<p id='forms'>Коментариев в базе: $sum1[0]</p>";
                ?>
                </div>   
                <div id="content_bottom"></div><br><br>
                </td> 
            </tr> 
		    <!--Подвал сайта-->     
            <?php include("\blocks\ooter.php");?>        
        </table>
    </body>
</html>