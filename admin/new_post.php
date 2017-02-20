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
                <h1>Добавление урока</h1>
                 <form id="forms" name="form1" method="post" action="add_post.php">
                         <p >
                           <label>Введите название урока<br>
                             <input size='70' type="text" name="title" id="title">
                             </label>
                         </p>
                         <br><br>
                         <p>
                           <label>Введите краткое описание урока<br>
                           <input size='70' type="text" name="meta_d" id="meta_d">
                           </label>
                         </p>
                          <br><br>
                         <p>
                           <label>Введите ключевые слова для урока<br>
                           <input size='70' type="text" name="meta_k" id="meta_k">
                           </label>
                         </p>
                          <br><br>
                         <p>
                           <label>Введите дату добавления урока<br>
                           <input size='70' name="date" type="text" id="date" value="<?php $date = date("Y-m-d"); echo $date; ?>">
                           </label>
                         </p>
                          <br><br>
                         <p>
                           <label>Ведите краткое описание урока с тэгами абзацев
                           <br>
                           <textarea name="description" id="description" cols="70" rows="5"></textarea>
				<script type="text/javascript">
					CKEDITOR.replace('description');
				</script>
                           </label>
                         </p>
                          <br><br>
                         <p>
                           <label>Введите полный текст урока
                           <br>
                           <textarea name="text" id="text" cols="70" rows="20"></textarea>
                      				<script type="text/javascript">
                      				CKEDITOR.replace( 'text');
                      				</script>
                           </label>
                         </p>
                          <br><br>
                         <p>
                           <label>Введите автора урока<br>
                           <input size='70' type="text" name="author" id="author">
                           </label>
                         </p>
                          <br><br>
                         <p>
                           <label>Введите где лежит миниатюра<br>
                           <input size='70' type="text" name="img" id="img">
                           </label>
                         </p>
                          <br><br>
                         <p>
                           <label>Выберите категорию урока<br>
                           
                           <select id="opt" name="cat">
                                     <?                                  		   
                                     $result = mysql_query("SELECT tittle,id FROM Categories",$db);
                                    
                                    if (!$result)
                                    {
                                    echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@ruseller.com. <br> <strong>Код ошибки:</strong></p>";
                                    exit(mysql_error());
                                    }
                                    
                                    if (mysql_num_rows($result) > 0)
                                    
                                    {
                                    $myrow = mysql_fetch_array($result); 
                                    
                                    do 
                                    {
                                    printf ("<option  value='%s'>%s</option>",$myrow["id"],$myrow["tittle"]);
                                    
                                    
                                    
                                    }
                                    while ($myrow = mysql_fetch_array($result));
                                    

                                    }
                                    
                                    else
                                    {
                                    echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
                                    exit();
                                    }
                                    
                                    ?>
                           </select>
                           
                           </label>
                         </p>
                          <br><br>
                         <p>
                           <label>
                           <input type="submit" name="submit" id="submit" value="Занести урок в базу">
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