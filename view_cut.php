<?php 
    include("blocks\bd.php");

    if(isset($_GET['cat']) ) {$cat=$_GET['cat'];}
    if(!isset($cat)) {$cat=1;}
    $result = mysql_query("SELECT * FROM Categories WHERE id='$cat'",$db);
    if(!$result)
    {
        echo "<p>Запрос на выборку даных из базы даных не прошел.<br><strong>Код ошибки:</strong></p>";
        exit(mysql_error());
    }
    if(mysql_num_rows($result)>0)
    {
        $myrow = mysql_fetch_array($result);
    }
    else
    {
        echo "<p>Информация по запросу не извлечена, в таблице нет записей</p>";
        exit();
    }
?>  
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
        <meta name="description" content="<?php echo $myrow['meta_d'] ?>">
        <meta name="keywords" content="<?php echo $myrow['meta_k'] ?>">
        <title><?php echo $myrow["tittle"];  ?></title>
        <link href="css/style.css" type="text/css" rel="stylesheet">
    </head>
    <body>        
        <table id="wrapper" >
            <!--Шапка сайта-->
            <?php include("\blocks\header.php");?>
		    <!--Меню сайта-->
			<tr >
                <?php include("\blocks\menu.php");?>
                <td id="content">
                <div id="con_tent">
                
                <div id="content_top"></div>
                <div id="content_center">
                    <?php 
                    echo "<div id='content_tittle'>";
                    
                    
                    
                          	

                        echo $myrow['text']; 
                        echo "</div><br>";
                        
                          $result77 = mysql_query("SELECT str FROM options", $db);
                            $myrow77 = mysql_fetch_array($result77);
                            $num = $myrow77["str"];
                            // Извлекаем из URL текущую страницу
                            @$page = $_GET['page'];
                            // Определяем общее число сообщений в базе данных
                            $result00 = mysql_query("SELECT COUNT(*) FROM data WHERE cat='$cat'");
                            $temp = mysql_fetch_array($result00);
                            $posts = $temp[0];
                            // Находим общее число страниц
                            $total = (($posts - 1) / $num) + 1;
                            $total =  intval($total);
                            // Определяем начало сообщений для текущей страницы
                            $page = intval($page);
                            // Если значение $page меньше единицы или отрицательно
                            // переходим на первую страницу
                            // А если слишком большое, то переходим на последнюю
                            if(empty($page) or $page < 0) $page = 1;
                              if($page > $total) $page = $total;
                            // Вычисляем начиная с какого номера
                            // следует выводить сообщения
                            $start = $page * $num - $num;
                            // Выбираем $num сообщений начиная с номера $start	
                        
                        
                        
                         $result = mysql_query("SELECT id,tittle,description,date,author,mini_img,view FROM data WHERE cat='$cat' ORDER BY id LIMIT $start, $num",$db);
                   
                        if($result)
                        {
                            
                            $myrow = mysql_fetch_array($result);
                            
                            do
                            {
                                
                                 printf("<table id='lessons' >
                                         <tr>
                                             <td class='lessons' >
                                                 <p><img id='lessons_img' align='left' src='%s'><a id='lessons1' href='view_post.php?id=%s'>%s</a></p><hr>
                                                 <div id='content_adate'>
                                                     <p>Data lekcja : %s</p>
                                                     <p id='content_author'>Autor lekcja :&nbsp;%s</p>
                                                 </div>
                                             </td>
                                         </tr>
                                         <tr>
                                            <td ><br>%s  <br><p class='count'>Widoki: %s</p> </td>
                                         </tr>
                                        
                                  </table><br><br>",$myrow['mini_img'],$myrow['id'],$myrow['tittle'],$myrow['date'],$myrow['author'],$myrow['description'],$myrow['view']);   
                            }
                            while ($myrow= mysql_fetch_array($result));
                            
                            // Проверяем нужны ли стрелки назад
                                    if ($page != 1) $pervpage = '<a href=view_cut.php?cat='.$cat.'&page=1>Pierwszy</a> | <a href=view_cut.php?cat='.$cat.'&page='. ($page - 1) .'>Poprzedni</a> | ';
                                    // Проверяем нужны ли стрелки вперед
                                    if ($page != $total) $nextpage = ' | <a href=view_cut.php?cat='.$cat.'&page='. ($page + 1) .'>Następna</a> | <a href=view_cut.php?cat='.$cat.'&page=' .$total. '>Ostatni</a>';
                                    
                                    // Находим две ближайшие станицы с обоих краев, если они есть
                                    if($page - 5 > 0) $page5left = ' <a href=view_cut.php?cat='.$cat.'&page='. ($page - 5) .'>'. ($page - 5) .'</a> | ';
                                    if($page - 4 > 0) $page4left = ' <a href=view_cut.php?cat='.$cat.'&page='. ($page - 4) .'>'. ($page - 4) .'</a> | ';
                                    if($page - 3 > 0) $page3left = ' <a href=view_cut.php?cat='.$cat.'&page='. ($page - 3) .'>'. ($page - 3) .'</a> | ';
                                    if($page - 2 > 0) $page2left = ' <a href=view_cut.php?cat='.$cat.'&page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
                                    if($page - 1 > 0) $page1left = '<a href=view_cut.php?cat='.$cat.'&page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';
                                    
                                    if($page + 5 <= $total) $page5right = ' | <a href=view_cut.php?cat='.$cat.'&page='. ($page + 5) .'>'. ($page + 5) .'</a>';
                                    if($page + 4 <= $total) $page4right = ' | <a href=view_cut.php?cat='.$cat.'&page='. ($page + 4) .'>'. ($page + 4) .'</a>';
                                    if($page + 3 <= $total) $page3right = ' | <a href=view_cut.php?cat='.$cat.'&page='. ($page + 3) .'>'. ($page + 3) .'</a>';
                                    if($page + 2 <= $total) $page2right = ' | <a href=view_cut.php?cat='.$cat.'&page='. ($page + 2) .'>'. ($page + 2) .'</a>';
                                    if($page + 1 <= $total) $page1right = ' | <a href=view_cut.php?cat='.$cat.'&page='. ($page + 1) .'>'. ($page + 1) .'</a>';
                                    
                                    // Вывод меню если страниц больше одной
                                    
                                    if ($total > 1)
                                    {
                                    Error_Reporting(E_ALL & ~E_NOTICE);
                                    echo "<div class=\"pstrnav\">";
                                    echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;
                                    echo "</div>";
                                    }
                            
                                                                                                                                            
                        }
                        else
                        {
                            echo "<div id='content_tittle'>";
                            echo "<p id='information'>Информация по запросу не извлечена, записей нет</p>";
                                                    
                            echo "</div>";
                        }
                    ?>  
                    </div>   
                    <div id="content_bottom"></div>
                    
                    
                    </div>
                </td> 
            </tr> 
		    <!--Подвал сайта-->     
            <?php include("\blocks\ooter.php");?>        
        </table>
    </body>
</html>