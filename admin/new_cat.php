<?php
include("lock.php");
include("\blocks\bd.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <title>Страница добавления новой категории</title>
        <link href="css/style.css" type="text/css" rel="stylesheet">
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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
                <h1>Добавление категории</h1>
                 <form id="forms" name="form1" method="post" action="add_cat.php">
                         <p >
                           <label>Введите название категории<br>
                             <input size='70' type="text" name="title" id="title">
                             </label>
                         </p>
                         <br><br>
                         <p>
                           <label>Введите краткое описание категории<br>
                           <input size='70' type="text" name="meta_d" id="meta_d">
                           </label>
                         </p>
                          <br><br>
                         <p>
                           <label>Введите ключевые слова для категории<br>
                           <input size='70' type="text" name="meta_k" id="meta_k">
                           </label>
                         </p>
                   
                          <br><br>
                         <p>
                           <label>Введите полный текст категории с тэгами
                           <br>
                           <textarea name="text" id="text" cols="70" rows="20"></textarea>
				<script type="text/javascript">
				CKEDITOR.replace( 'text');
				</script>
                           </label>
                         </p>
                          <br><br>
                         <p>
                           <label>
                           <input type="submit" name="submit" id="submit" value="Занести категорию в базу">
                           </label>
                         </p>
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