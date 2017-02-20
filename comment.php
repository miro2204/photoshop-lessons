<?php
  include("blocks\bd.php");  
  if(isset($_POST['author'])){  $author=$_POST['author'];}
  if(isset($_POST['text'])){  $text=$_POST['text'];}
  if(isset($_POST['pr'])){  $pr=$_POST['pr'];}
  if(isset($_POST['sub_coment'])){  $sub_coment=$_POST['sub_coment'];}
  if(isset($_POST['id'])){  $id=$_POST['id'];}
  
  
  if(isset($sub_coment))
  {
        if(isset($author)){trim($author);}
        else {$author="";}
        if(isset($text)){trim($text);}
        else {$text="";}
        if(empty($author) or empty($text))
        {exit("<p>Вы ввели не всю информацию, вернитесь назад и заполните все поля</p><br>
        <input type='button' name='back' value='Вернуться назад' onclick='javascript:self.back();'>");}
        
    
    $author = stripslashes($author);
    $text = stripslashes($text);
    $author = htmlspecialchars($author);
    $text = htmlspecialchars($text);
    $result = mysql_query("SELECT sum FROM comments_settings ",$db);
    $myrow = mysql_fetch_array($result);
    
    
    if($pr==$myrow["sum"])
    {
        $date = date("Y-m-d");
        $result2 = mysql_query("INSERT INTO comments (post, author, text, date)
        VALUES ('$id','$author','$text','$date')",$db);
        
        echo "<html><head>
                    <meta http-equiv='Refresh' content='0; URL=view_post.php?id=$id'>
            </head></html>";
        exit();
    }
    else
     {exit("<p>Вы ввели не верную сумму чисел, вернитесь к предыдущей странице</p><br>
        <input type='button' name='back' value='Вернуться назад' onclick='javascript:self.back();'>");}
    
    
    
  }
  
  
  
  
  
  
  
  
  
  
?>