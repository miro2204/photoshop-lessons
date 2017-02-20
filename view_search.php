<?php 
    include("blocks\bd.php");
    
     if(isset($_POST['search'])){  $search=$_POST['search'];}
    if(isset($_POST['submit_s'])){  $submit_s=$_POST['submit_s'];}
    
    if(isset($submit_s))
    {
        if(empty($search))
        {
            exit("<p>Поисковый запрос не веден</p>");
        }
        $search= trim($search);
        $search= htmlspecialchars($search);
        $search=stripslashes($search);
        
        
        
    }
    else 
    {
        exit("<p>Вы обратились к файлу без необходимих параметров</p>");
    }
?>  
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="description" content="<?php echo $myrow['meta_d'] ?>">
        <meta name="keywords" content="<?php echo $myrow['meta_k'] ?>">
        <title><?php echo 'запрос на - $search';  ?></title>
        <link href="css/style.css" type="text/css" rel="stylesheet">
    </head>
    <body>     
    <div id="cent">   
        <table id="wrapper" >
            <!--Шапка сайта-->
            <?php include("\blocks\header.php");?>
		    <!--Меню сайта-->
			<tr id="menu_and_content">
                <?php include("\blocks\menu.php");?>
                <td id="content">
                <div id="content_top"></div>
                <div id="content_center">
                <h1> Найдены уроки </h1><br>
                <?php 
                  
                       $result1 = mysql_query("SELECT id, tittle, description, date, author, mini_img, view  
                                                FROM data 
                                                WHERE lower(text) like '%$search%' or lower(tittle) like '%$search%'",$db);
                        if(!$result1)
                        {
                            echo "<p>Запрос на выборку даных из базы даных не прошел.<br><strong>Код ошибки:</strong></p>";
                            exit(mysql_error());
                        }
                        if(mysql_num_rows($result1)>0)
                        {
                            $myrow1 = mysql_fetch_array($result1);
                            
                            do
                            {
                                
                                 printf("<table id='lessons' >
                                         <tr>
                                             <td class='lessons' >
                                                 <p><img id='lessons_img' align='left' src='%s'><a id='lessons1' href='view_post.php?id=%s'>%s</a></p><hr>
                                                 <div id='content_adate'>
                                                     <p>Дата добавления урока : %s</p>
                                                     <p id='content_author'>Автор урока :&nbsp;%s</p>
                                                 </div>
                                             </td>
                                         </tr>
                                         <tr>
                                            <td ><br>%s  <br><p class='count'>Просмотров: %s</p> </td>
                                         </tr>
                                        
                                  </table><br><br>",$myrow1['mini_img'],$myrow1['id'],$myrow1['tittle'],$myrow1['date'],$myrow1['author'],$myrow1['description'],$myrow1['view']);   
                            }
                            while ($myrow1= mysql_fetch_array($result1));
                        }
                        else
                        {
                            echo "<div id='content_tittle'>";
                            echo "<p id='information'>Информация по запросу не извлечена, записей нет</p>";
                            echo "</div>";
                        }
                    ?>  
                    </div>   
                    <div id="content_bottom"></div><br><br>
                    
                    
                      
                </td> 
            </tr> 
		    <!--Подвал сайта-->     
            <?php include("\blocks\ooter.php");?>        
        </table>
        </div>
    </body>
</html>