<?php

$db= mysqli_connect("localhost","root","","testdb");
$query = "SELECT id, headline, timestamp, story FROM news ORDER BY timestamp DESC";
$result = mysqli_query($db,$query);
if(!$result){
   echo('Error selecting news: ' . $mysql_error());
   exit();
}
if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_object($result))
    {
    ?>

 
<div id ="pad">
       <?php  
          $cont=($row->timestamp); 
          $news=($row->headline);
          $story=($row->story);
        ?>
<font size="+1"><b><?php echo "$news" ?></b> <i><?php  echo "$cont" ?></i><b><i><?php  echo $story ?></i></b></font>
   <br>
   <font size="-2"><a href="edit.php?a=edit&id=<?php echo $row->id; ?>">edit</a> | 
   <a href="edit.php<?a=delete&id=<? echo $row->id; ?>">delete</a></font>
</div>
  <?php
}
    
   mysqli_close($db);
}

//  edit Or delete news<
elseif($a == 'edit'){
if(!isset($update)){
$db = mysqli_connect("localhost", "root", "","testdb");
}
$query = "SELECT name, email, headline, story <FROM news WHERE id = '$id'";
$result = mysqli_query($db,$query);
if(!$result){
   echo('Error selecting news item: ' . $mysql_error());
   exit();
}
mysqli_fetch_object($result);
?>
<form name="form1" method="post" action="edit.php<?a=edit&id=<? echo($id) ?>&update=1">
  <table width="50%" border="0" cellspacing="0" cellpadding="0">
    <tr> 
      <td width="50%">Name</td>
      <td><input name="name" type="text" id="name" value="<? echo($row->name) ?>"></td>
    </tr>
    <tr> 
      <td>Email</td>
      <td><input name="email" type="text" id="email" value="<? echo($row->email) ?>"></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>Headline</td>
      <td><input name="headline" type="text" id="headline" value="<? echo($row->headline) ?>"></td>
    </tr>
    <tr> 
      <td>News Story</td>
      <td><textarea name="story" id="story" value="<? echo($row->story) ?>"></textarea></td>
    </tr>
    <tr> 
      <td colspan="2"><div align="center">
          <input name="hiddenField" type="hidden" value="update">
          <input name="add" type="submit" id="add" value="Update">
        </div></td>
    </tr>
  </table>
  </form>
<?php
}else{
$query = "UPDATE news SET name = '$name, email = '$email', headline = '$headline', story = '$story', timestamp = NOW() WHERE id = '$id'";
$result = mysqli_query($db,$query);
if(!$result){
   echo('Error updating news item: ' . $mysql_error());
   exit();
}else{
   mysqli_close($db);
   echo('Update successful!');
 }
    
}if($a == 'delete'){
$db = mysqli_connect("localhost", "root", "", "testdb");
if(!$db){
   echo('Error connecting to the database: ' . $mysql_error());
   exit();
}
$query = "DELETE FROM news WHERE id = '$id'";
$result = mysqli_query($db,$query);
if(!$result){
   echo('Error deleteing news item: ' . $mysql_error());
   exit();
}
mysql_close($db);
echo('News item deleted.');
} ?>
</body>
</html>
