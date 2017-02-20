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
                          echo"<h1>Выбор урока для редактирования</h1>";
                       $result = mysql_query("SELECT id, tittle FROM data");
                       $myrow = mysql_fetch_array($result);
                       do
                       {
                        printf("<p id='forms'><a href='edit_post.php?id=%s'>%s</a></p><br>",$myrow['id'],$myrow['tittle']);
                       }
                        while( $myrow = mysql_fetch_array($result));
                    }
                    else
                        {
                            echo"<h1>Редактирование урока</h1>";
                       $result = mysql_query("SELECT * FROM data WHERE id=$id");
                       $myrow = mysql_fetch_array($result);
                       
                       $result2 = mysql_query("SELECT id,tittle FROM Categories");
                       $myrow2 = mysql_fetch_array($result2);
                       
                       $count = mysql_num_rows($result2);
                       echo "<form id='forms' name='form1' method='post' action='apdate_post.php'>
                       <label>Выберите категорию урока<br>
                       <p><select name='cat' size='$count'>";
                       
                       do
                       {
                         if($myrow['cat']==$myrow2['id'])
                        {
                        printf("<option value='%s' selected>%s</option>",$myrow2['id'],$myrow2['tittle']);
                        }
                        else
                        {
                            printf("<option value='%s'>%s</option>",$myrow2['id'],$myrow2['tittle']);
                        }
                       }
                       while($myrow2 = mysql_fetch_array($result2));
                       echo "</select></p></label><br><br>";
                        print<<<HERE
                        
                        
                          
                         <p >
                           <label>Введите название урока<br>
                             <input size='70'value="$myrow[tittle]" type="text" name="title" id="title">
                             </label>
                         </p>
                         <br><br>
                         <p>
                           <label>Введите краткое описание урока<br>
                           <input size='70' value="$myrow[meta_d]" type="text" name="meta_d" id="meta_d">
                           </label>
                         </p>
                          <br><br>
                         <p>
                           <label>Введите ключевые слова для урока<br>
                           <input size='70' value="$myrow[meta_k]" type="text" name="meta_k" id="meta_k">
                           </label>
                         </p>
                          <br><br>
                         <p>
                           <label>Введите дату добавления урока<br>
                           <input size='70' value="$myrow[date]" name="date" type="text" id="date" value="">
                           </label>
                         </p>
                          <br><br>
                         <p>
                           <label>Ведите краткое описание урока с тэгами абзацев
                           <br>
                           <textarea name="description" id="description" cols="70" rows="5">$myrow[description]</textarea>
						   <script type="text/javascript">
							CKEDITOR.replace( 'description');
							</script>
                           </label>
                         </p>
                          <br><br>
                         <p>
                           <label>Введите полный текст урока с тэгами
                           <br>
                           <textarea name="text" id="text" cols="70" rows="20">$myrow[text]</textarea>
						    <script type="text/javascript">
							CKEDITOR.replace( 'text');
							</script>
                           </label>
                         </p>
                          <br><br>
                         <p>
                           <label>Введите автора урока<br>
                           <input size='70' value="$myrow[author]" type="text" name="author" id="author">
                           </label>
                         </p>
                          <br><br>
                         <p>
                           <label>Введите где лежит миниатюра<br>
                           <input size='70' value="$myrow[mini_img]" type="text" name="img" id="img">
                           </label>
                         </p>
                      
                         
                         
                         <input name="id" type="hidden" value="$myrow[id]">
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