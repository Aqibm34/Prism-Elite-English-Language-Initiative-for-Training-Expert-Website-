<!DOCTYPE HTML>
<html>
    <head>
        <title> user Queries</title>
    <link rel="stylesheet" href="css/sub.css" type="text/css" media="all">
    </head>
    <body>
    
<div id="banner">
    <h2 style="text-align:left; padding-top:70px; padding-left:80px; font-size:50px ">Users<span style="padding-left:100px"> Queries </span></h2>
</div>
    </body>
                 
<table class="gridtable">
<tr>
   
   <th>Name</th>
   <th>Email</th>
    <th>Query</th>
</tr>
                
<?php              
    $conn = mysqli_connect('localhost', 'root','', 'testdb');

$sql = "SELECT id, user_name, user_email , user_message FROM users_data";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
             
            <td><?php echo $row['user_name']; ?></td> 
            <td><?php echo $row['user_email']; ?></td> 
            <td><?php echo $row['user_message']; ?></td>
              
        
        </tr>
    </table>

<?php
    }
} 
    else {
    echo "0 results";
}

mysqli_close($conn);
?>