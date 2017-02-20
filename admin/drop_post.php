<?php
include ("lock.php");
include("\blocks\bd.php");
if(isset($_POST['id']))   {$id=$_POST['id'];}
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
                
                  <?php 
                        if (isset($id) )
                        {
                        $result = mysql_query ("DELETE FROM data WHERE id='$id'");
                        
                        if ($result == 'true') {echo "<p>Ваша урок успешно удален!</p>";}
                        else {echo "<p>Ваш урок не удален!</p>";}
                        
                        
                        }		 
                        else 

                        {
                        echo "<p>Удалить урок не возможно</p>";
                        }
                        		 
                        		 
                        		 
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