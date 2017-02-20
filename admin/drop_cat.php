<?php
include ("lock.php");
include("\blocks\bd.php");
if(isset($_POST['id']))   {$id=$_POST['id'];}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <title>Обработчик</title>
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
                            
                            $result = mysql_query("SELECT id FROM data WHERE cat='id'",$db);
                            if(mysql_num_rows($result)>0)
                            {
                                echo"Категорию, которую Вы хотите удалить есть заметки";
                            }
                            
                            
                        $result = mysql_query ("DELETE FROM Categories WHERE id='$id'");
                        
                        if ($result == 'true') {echo "<p>Ваша категория успешно удалена!</p>";}
                        else {echo "<p>Ваша категория не удалена!</p>";}
                        
                        
                        }		 
                        else 
                        
                        {
                        echo "<p>Удалить категорию не возможно</p>";
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