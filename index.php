<?php 
    include("blocks\bd.php");
    
    $result = mysql_query("SELECT tittle, meta_d, meta_k, text 
                            FROM settings
                            WHERE page='index'",$db);
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
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="description" content="<?php echo $myrow['meta_d'] ?>"/>
        <meta name="keywords" content="<?php echo $myrow['meta_k'] ?>"/>
        <title><?php echo $myrow["tittle"];  ?></title>
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
                <h1>Ostatnie lekcje: </h1><br/>
                <?php 
                  
                        $result1 = mysql_query("SELECT id, tittle, description, date, author, mini_img, view  
                                                FROM data 
                                                ORDER BY date DESC, id DESC
                                                LIMIT 3",$db);
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
                                                     <p>Data lekcja : %s</p>
                                                     <p id='content_author'>Autor lekcja :&nbsp;%s</p>
                                                 </div>
                                             </td>
                                         </tr>
                                         <tr>
                                            <td ><br>%s  <br><p class='count'>Widoki: %s</p> </td>
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
                    <div id="content_bottom"></div><br/><br/>
                    
                    
                      <div id="content_top"></div>
                     <div id="content_center">
                     <?php 
                        echo "<div id='content_tittle'>";
                        echo $myrow["text"];
                        echo "</div>";
                    ?>
                     </div>   
                    <div id="content_bottom"></div>
                </td> 
            </tr> 
		    <!--Подвал сайта-->     
            <?php include("\blocks\ooter.php");?>        
        </table>
    </body>
</html>