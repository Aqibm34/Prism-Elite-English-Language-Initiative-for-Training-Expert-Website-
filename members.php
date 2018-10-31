<!DOCTYPE html>
<html>
<head>
<title> Subscribed users </title>
<link rel='stylesheet' href='css/sub.css' type="text/css" media='all'>
    </head>
    
    <body>
      
        <div id='banner'>  
            <h2 style="text-align:left; padding-top:70px; padding-left:80px; font-size:50px ">Subscribed <span>Users</span></h2>
        </div>
  
<!--  FETCHING --> 
<div style="margin-left:480px;">        
<div id='tab'>                
<table class="gridtable">
<tr>
   
   <th>Members</th>
   
</tr>
                
<?php              
    $conn = mysqli_connect('localhost', 'root','', 'testdb');

$sql = "SELECT id, name, email FROM newsletter_signups";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
             
            <td><?php echo $row['name']; ?></td> 
        </tr>
    
<?php
    }
} 
    else {
    echo "0 results";
}

mysqli_close($conn);
?>
    </table>
</div>
    </div>
       
    </body>
