<!DOCTYPE html>
<html>
    <head>
<title>Showing News</title> 
<link rel="stylesheet" href="css/sub.css" type="text/css" media="all">
    </head>
<body>
    <div id="banner">
    <h2 style="text-align:left; padding-top:70px; padding-left:80px; font-size:50px ">News/Updates </h2>
</div>
    
<!--Fetching news -->
<div id="arctable1">
         <table class="gridtable1" >
             <tr>
                 <th>Date & time</th>
                 <th>Headlines</th>
                <th>Details</th>
             </tr>
<?php
 $db = mysqli_connect('localhost', 'root', '','testdb') or die ("error");
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
   <!-- <td><font size="-2"><a href="edit.php?a=edit&id=<?php echo $row->id; ?>">edit</a> | 
       <a href="edit.php?a=delete&id=<? echo $row->id; ?>">delete</a></font></td> -->
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
    