<?php
include("lock.php");
include("blocks/bd.php");
if (isset($_GET['id'])) {$id = $_GET['id'];}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <title>Админский блок</title>
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
                    <?php
                    if(!isset($id))
                    {
                          echo"<h1>Выбор текста для редактирования</h1>";
                       $result = mysql_query("SELECT id, tittle FROM settings");
                       $myrow = mysql_fetch_array($result);
                       do
                       {
                        printf("<p id='forms'><a href='edit_text.php?id=%s'>%s</a></p><br>",$myrow['id'],$myrow['tittle']);
                       }
                        while( $myrow = mysql_fetch_array($result));
                    }
                    else
                        {
                            echo"<h1>Редактирование текста</h1>";
                       $result = mysql_query("SELECT * FROM settings WHERE id=$id");
                       $myrow = mysql_fetch_array($result);

                    
                      
                        print<<<HERE
                        
                        <form id='forms' name='form1' method='post' action='apdate_text.php'>
                          
                         <p >
                           <label>Введите название текста<br>
                             <input size='70' value='$myrow[tittle]' type="text" name="title" id="title">
                             </label>
                         </p>
                         <br><br>
                         <p>
                           <label>Введите краткое описание урока<br>
                           <input size='70' value='$myrow[meta_d]' type="text" name="meta_d" id="meta_d">
                           </label>
                         </p>
                          <br><br>
                         <p>
                           <label>Введите ключевые слова для урока<br>
                           <input size='70' value='$myrow[meta_k]' type="text" name="meta_k" id="meta_k">
                           </label>
                         </p>
                          <br><br>
                         <p>
                           <label>Введите полный текст с тэгами
                           <br>
                           <textarea name="text" id="text" cols="70" rows="20">$myrow[text]</textarea>
								<script type="text/javascript">
									CKEDITOR.replace( 'text');
								</script>
						   </label>
                         </p>
                         <input name="id" type="hidden" value='$myrow[id]'>
                          <br><br>
                         <p>
                           <label>
                           <input type="submit" name="submit" id="submit" value="Сохранить изменения">
                           </label>
                         </p>
                </form>
HERE;
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