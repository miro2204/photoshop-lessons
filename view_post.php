<?php 
    include("blocks\bd.php");
    if(isset($_GET['id']) ) {$id=$_GET['id'];}
    if(!isset($id)) {$id=1;}
    
    $result = mysql_query("SELECT * FROM data WHERE id='$id'",$db);
    if(!$result)
    {
        echo "<p>Запрос на выборку даных из базы даных не прошел.<br><strong>Код ошибки:</strong></p>";
        exit(mysql_error());
    }
    if(mysql_num_rows($result)>0)
    {
        $myrow = mysql_fetch_array($result);
        
        $new_view=$myrow["view"]+1;
        
        $update = mysql_query("UPDATE data SET view='$new_view' WHERE id='$id'",$db);
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
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
        <meta name="description" content="<?php echo $myrow['meta_d'] ?>"/>
        <meta name="keywords" content="<?php echo $myrow['meta_k'] ?>"/>
        <title><?php echo $myrow["tittle"];  ?></title>
        <link href="css/style.css" type="text/css" rel="stylesheet"/>  
     	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.js"></script>
	
    </head>    
    <script type="text/javascript">
	
		(function(jq) {
			jq.autoScroll = function(ops) {
			ops = ops || {};
			ops.styleClass = ops.styleClass || 'scroll-to-top-button';
			var t = jq('<div class="'+ops.styleClass+'"></div>'),
            d = jq(ops.target || document);
			jq(ops.container || 'body').append(t);

			t.css({
				opacity: 0,
				position: 'absolute',
				top: 0,
				right: 0
			}).click(function() {
				jq('html,body').animate({
					scrollTop: 0
				}, ops.scrollDuration || 1000);
			});

			d.scroll(function() {
				var sv = d.scrollTop();
				if (sv < 10) {
					t.clearQueue().fadeOut(ops.hideDuration || 200);
					return;
				}

				t.css('display', '').clearQueue().animate({
					top: sv,
					opacity: 0.8
				}, ops.showDuration || 500);
			});
		};
	})(jQuery);
	$(document).ready(function(){
		$.autoScroll({
			scrollDuration: 2000, 
			showDuration: 600, 
			hideDuration: 300
		});
	});
	</script>
    <body>        
        <table id="wrapper" >
            <!--Шапка сайта-->
            <?php include("\blocks\header.php");?>
		    <!--Меню сайта-->
			<tr id="menu_and_content">
                <?php include("\blocks\menu.php");?>
                  
                <td id="content">
               <div id='content_top' ></div>
               <div id='content_center'>
                        <?php  
                           
                            echo"<div id='content_lesson'>";          
                                printf("<h1>%s</h1> <div id='content_ad'><p id='content_author'>Autor:&nbsp;</p> %s <p>Data: %s</p></div><h4 id='content_img'>%s</h4><p id='content_colo'>Widoki: %s</p>",
                                $myrow[tittle],$myrow[author],$myrow[date],$myrow[text],$myrow[view]);
                            echo"</div>";
                            
                            
                            echo "<div id='coments_read'> ";                        
                                echo "<p id='coments_this'>Komentarze do artykułu: </p><hr>";
                                $result3 = mysql_query("SELECT * FROM comments WHERE post='$id'",$db);
                                if(mysql_num_rows($result3)>0)
                                {
                                    $myrow3 = mysql_fetch_array($result3);
                                    do
                                    {
                                        printf("<div class='coments_bold'><p>Komentarze dodane: %s <br> Дата: %s </p></div><p id='coments_text'>%s</p><hr>",
                                        $myrow3["author"], $myrow3["date"], $myrow3["text"]);
                                    }
                                    while($myrow3 = mysql_fetch_array($result3));
                                  
                                    $result3 = mysql_query("SELECT img FROM comments_settings",$db);
                                    $myrow3 = mysql_fetch_array($result3); 
                                }
                            echo"</div>";
                        ?>  
                      <div id="new_coment">
                       <p id='coments_this'>Dodaj swój komentarz: </p>
                       <form action="comment.php" method="post" name="from_coment">
                       
                       <p><label>Wpisz swoje imię: <input type="text" name="author" size="42"/></label></p>
                       <br/><br/> 
                        <p><label>Tekst komentarza: <br/><textarea name="text" cols="60" rows="4"></textarea></label></p>
                        <br/><br/>
                        <p>Wpisz sumę z obrazka<br/><img style="margin-top: 10px;" src="images/sum.png" width="50" height="18"/>
                       <!-- <?echo $result3['img'];?>-->
                        <input   type="text" name="pr" size="5"/></p>
                        <br/>
                        <input name="id" type="hidden" value=" <?php echo $id; ?> "/>
                        <p><input type="submit" name="sub_coment" value="Komentirovat"/></p>
                        </div>
                       </form>
                      </div>
                      <div id='content_bottom'></div>
                </td> 
            </tr> 
		    <!--Подвал сайта-->     
            <?php include("\blocks\ooter.php");?>        
        </table>
       <div style="opacity: 0.8; position: absolute; top: 456px; right: 0px; display:none;" class="scroll-to-top-button"></div>
    </body>
</html>