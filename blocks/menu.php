<!--Левое меню сайта-->

<td id="menu">

            <?php 
                echo"<div id='menu_top'></div>";
                echo"<div id='menu_center'>";
                echo "<div id='lessons_fotoshop'> <h1>Lekcje dla Photoshopa</h1> </div> <div id='menu2'>";
                $result2 = mysql_query("SELECT * 
                                        FROM Categories",$db);
                if(!$result2)
                {
                    echo "<p>Запрос на выборку даных из базы даных не прошел.<br><strong>Код ошибки:</strong></p>";
                    exit(mysql_error());
                }
                if(mysql_num_rows($result2)>0)
                {
                    $myrow2 = mysql_fetch_array($result2);
                    do
                    {
                        printf("<p id='border'><a href='view_cut.php?cat=%s'>%s</a></p>",$myrow2['id'],$myrow2['tittle']);
                    }
                    while($myrow2=mysql_fetch_array($result2));
                    
                   echo"</div>";
                }
                else
                {
                    echo "<p>Информация по запросу не извлечена, в таблице нет записей</p>";
                    exit();
                }
                
                echo"</div>";
                echo"<div id='menu_bootom'></div>";
            ?>  
            <br>
           
            <div id='menu_top'>
                </div>
                <div id='menu_center'>
                    <div id='lessons_fotoshop'> 
                    <h1>Szukaj lekcji</h1> 
                </div> 
                    <form  action="view_search.php" method="post" name="form_s">
                  <!--  <p id="search">Поисковый запрос должен быть не менее 4-х символов</p>-->
                    <p id="search">
                        <input type="text" name="search" size="25" maxlength="40">
                        <br>
                        <br>
                        <input type="submit" value="Wyszukaj" name="submit_s">
                    </p>
                    </form>
            </div>
            <div id='menu_bootom'></div>
            
            
            
            
</td>
