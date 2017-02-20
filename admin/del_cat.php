<?php
include ("lock.php");
include("\blocks\bd.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <title>Страница удаления категории</title>
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
                
                <h1 >Удаление выбраной категории</h1>
                <form id='forms' action="drop_cat.php" method="post">
                <?php
                
                    $result = mysql_query("SELECT id, tittle FROM Categories");
                    $myrow = mysql_fetch_array($result);
                    do
                    {
                        printf("<p><input type='radio' name='id' value='%s'><label>%s</label></p><br>",$myrow['id'], $myrow['tittle']);
                    }
                    while($myrow = mysql_fetch_array($result));
                ?>
                <br>
                <input type="submit" name="submit" value="удалить урок">
                </form>
                </div>   
                <div id="content_bottom"></div><br><br>
                </td> 
            </tr> 
		    <!--Подвал сайта-->     
            <?php include("\blocks\ooter.php");?>        
        </table>
    </body>
</html>