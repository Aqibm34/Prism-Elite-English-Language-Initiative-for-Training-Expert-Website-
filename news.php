<html>
<head>
<title>Add News</title>
<meta http-equiv="Content-Type" content="text/html; charset="iso"-8859-1">
    <link rel='stylesheet' href='css/sub.css' type="text/css" media='all'>
</head>
<body>
    <div id="banner">
    <h2 style="text-align:left; padding-top:70px; padding-left:80px; font-size:50px ">Add<span style="padding-left:100px">  news </span></h2>
</div>

  
<?php
     $db = mysqli_connect('localhost', 'root', '','testdb') or die ("error");
?>
    
    <!-- Insert news -->
    <div id="pad1">
    <?php
if(isset($_POST['add'])){
  
   $name   = $_POST["name"];
   $email  = $_POST["email"];
   $headline = $_POST["headline"];
   $story   = $_POST["story"];
    $sql="INSERT INTO news(name, email, headline, story, timestamp)VALUES('$name', '$email', '$headline', '$story', NOW())";
    mysqli_query($db,$sql);
  
   echo('<font size=25px>Success!</font><br><a href="add.php">Click here</a> to add more news.<br><br><a href="edit.php">Click here</a> to edit news.<br><br><a href="../index.php">Click here</a> to return to the main page.');
   }
    
?>
    </div>
<div id="pad">
<form id="contacts-form" name="form1" method="post" action="#" >
  <table width="50%" border="0" cellspacing="0" cellpadding="0">
    <tr> 
        
      <td width="50%">Name</td>
      <td><input name="name" type="text" id="name"></td>
    
            </tr>
      <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>Email</td>
      <td><input name="email" type="text" id="email"></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>Headline</td>
      <td><input name="headline" type="text" id="headline"></td>
    </tr>
      <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
             <td>News Story</td>
      <td><textarea name="story" id="story"></textarea></td>
        
            </tr>
      <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2"><div align="center">
          <input name="hiddenField" type="hidden" value="add_n">
          <input name="add" type="submit" id="add" value="Submit">
        </div></td>
    </tr>
  </table>
  </form>
    
    <h2 style="text-align:left; padding-top:70px; padding-left:80px; font-size:50px; color:black; ">News / Updates </h2>

                         
  
<!--Fetching news -->

         <table class="gridtable1" >
             <tr>
                 <th>Date & time</th>
                 <th>Headlines</th>
                <th>Details</th>
             </tr>
<?php
$query = "SELECT id , headline, timestamp, story FROM news ORDER BY timestamp DESC";
$result = mysqli_query($db,$query);
if(!$result){
   echo('Error selecting news: ' . $mysqli_error());
   exit();
}
if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_object($result))
    {
    ?>

 
<div id ="set">
       <?php  
          $cont=($row->timestamp); 
          $news=($row->headline);
          $story=($row->story);
        ?>
    <tr><td><?php  echo "$cont" ?></td>
    <td><?php echo "$news" ?></td> 
    <td><?php  echo "$story" ?></td></tr>
   <br>
   <!--
<td><font size="-2"><a href="edit.php?a=edit&id=<?php echo $row->id; ?>">edit</a> | 
       <a href="edit.php?a=delete&id=<? echo $row->id; ?>">delete</a></font></td>
-->
</div>
    </table>
    </div>
    </body>
</html>
  <?php
}
    
   mysqli_close($db);
}
?>




