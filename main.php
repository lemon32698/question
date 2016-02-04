<?
//以下為取得傳遞過來的各項資料的程式碼
$del=$_GET["del"];
$name=$_POST["name"];
$content=addslashes(nl2br($_POST["content"]));
$ref=$_POST["ref"];
$sub=$_POST["sub"];
$email=$_POST["email"];

//以下為刪除資料的程式碼
if (isset($del)): //判斷是否有刪除的項目
 $link_ID = mysql_connect("127.0.0.1","root","999999");
 //連接MySQL伺服器
 mysql_select_db("class");
 //指定使用資料庫 
 $str="DELETE FROM board2
       WHERE sn=$del OR refsn=$del ;";
 //查詢字串
 $result=mysql_query($str,$link_ID);
 //送出查詢
 mysql_close($link_ID);
 //關閉資料庫連接
endif;
//以下為新增文章的程式碼
if (!empty($name) and !empty($content)):
//輸入判斷
 $link_ID = mysql_connect("127.0.0.1","root","999999");
  //連接Mysql伺服器
 mysql_select_db("class");
 //指定使用資料庫 
 $str="INSERT INTO board2
       (subj,name,email,content,time,refsn)
       VALUES
       ('$sub','$name','$email','$content',NOW(),'$ref');";
 //查詢字串
   if (empty($ref)):
   //如果是新文章，則沒有回應的文章序號
   $str="INSERT INTO board2
         (subj,name,email,content,time)
         VALUES
         ('$sub','$name','$email','$content',NOW());";
   //查詢字串
   endif;
 $result=mysql_query($str,$link_ID);
 //送出查詢
 mysql_close($link_ID);
 //關閉資料庫連接
endif;
?>
<frameset rows="65%,*">
 <frame src="showtitle.php" name="title">
 <frame src="body.php" name="body">
</frameset>