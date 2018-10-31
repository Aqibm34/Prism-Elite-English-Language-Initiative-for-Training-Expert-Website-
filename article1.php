<!DOCTYPE HTML>
<html>
    <head>
        <title> user Queries</title>
    <link rel="stylesheet" href="css/sub.css" type="text/css" media="all">
    </head>
    <body>
    
<div id="banner">
    <h2 style="text-align:left; padding-top:50px; padding-left:80px; font-size:50px ">Our Articles<span style="padding-left:100px"></span></h2>
</div>
    <div id="arctable">
         <table class="gridtable" >
<tr>
   
   <th> Download</th>
    <th> File name</th>
    
</tr> 

        </div>
    
    <!-- Display and download data -->
     <?php
        $con = mysqli_connect('localhost', 'root', '' ,'testdb') or die(mysql_error());
       
        $query = "SELECT id, name FROM upload";
        $result = mysqli_query($con,$query) or die('Error, query failed');
        if (mysqli_num_rows($result) == 0) {
            echo "Database is empty <br>";
        } else {
            while (list($id, $name) = mysqli_fetch_array($result)) {
                echo " <tr>\n";
  ?>
       
        <td> <a href='download.php?id=$id'><img src="images/icon4.png"><font color="black" ; size="4px"> Download</font></a> </td>
       
        
                <td><a href="download.php?id=<?php echo urlencode($id); ?></td>"
                       ><font color="black" ; size="4px"><?php echo  urlencode($name); ?></font></a> <br>
                <?php
            }
        }
        mysqli_close($con);
        ?>

    
    
        </body>