<?php
include ("lock.php");
include ("blocks/bd.php");
if (isset($_POST['title']))  
{
$title = $_POST['title']; 
if ($title == '') 
{
unset($title);
}  
}
if (isset($_POST['meta_d']))      {$meta_d = $_POST['meta_d']; if ($meta_d == '') {unset($meta_d);}}
if (isset($_POST['meta_k']))      {$meta_k = $_POST['meta_k']; if ($meta_k == '') {unset($meta_k);}}

if (isset($_POST['text']))        {$text = $_POST['text']; if ($text == '') {unset($text);}}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <title>Админский блок</title>
        <link href="css/style.css" type="text/css" rel="stylesheet"/>
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
                        if (isset($title) && isset($meta_d) && isset($meta_k)&& isset($text))
                        {
                        /* Здесь пишем что можно заносить информацию в базу */
                        $result = mysql_query ("INSERT INTO Categories (tittle,meta_d,meta_k,text) VALUES ('$title', '$meta_d','$meta_k','$text')");
                        
                        if ($result == 'true') {echo "<p>Ваша категория успешно добалена!</p>";}
                        else {echo "<p>Ваша категория не добалена!</p>";}
                        }		 
                        else 
                        
                        {
                        echo "<p>Вы ввели не всю информацию, поэтому категория в базу не может быть добалена.</p>";
                        }		 
   		         ?>
                
                </div>   
                <div id="content_bottom"></div><br/><br/>
                </td> 
            </tr> 
		    <!--Подвал сайта-->     
            <?php include("\blocks\ooter.php");?>        
        </table>
    </body>
</html>