<!DOCTYPE html>
<html lang="en">
    
<head>
<title>PRISM-ELITE (English Language Initiative for Training Experts)</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="css/s.css" type="text/css" media="all">

</head>
<body id="page1">
<div class="wrap">
  <header>
    <div class="container">
      <h1><a href="#">Student's site</a></h1>
      <nav>
        <ul>
    
    <?php echo '<li class="current"><a href="index1.php" class="m1">Home Page</a></li>' ?>
    <?php echo '<li><a href="about-us.php" class="m2">About Us</a></li>' ?>
    <?php echo '<li><a href="articles.php" class="m3">Our Articles</a></li>' ?>
    <?php echo '<li><a href="contact-us.php" class="m4">Contact Us</a></li>' ?>
    <?php echo '<li class="last"><a href="sitemap.php" class="m5">Login</a></li>' ?>
              
        </ul>
      </nav>
      <form action="#" id="search-form">
       
      </form>
    </div>
  </header>
  <div class="container">
    <aside>
      <h3>Categories</h3>
      <ul class="categories">
        <li><span><a href="Subscibed.php">Subscribed Users</a></span></li>
        <li><span><a href="queries.php">User Queries</a></span></li>
        <li><span><a href="news.php">Live Feed</a></span></li>
        <li><span><a href="#">Administrators</a></span></li>
        <li><span><a href="#">Basic Information</a></span></li>
      </ul>
        
        <form action="#" enctype="multipart/form-data" id="newsletter-form" method="post">
        <fieldset>
          <div class="rowElem">
            <h2>Uploads</h2>
            <input type="hidden" name="MAX_FILE_SIZE" value="16000000">
            <input name="userfile" type="file" id="userfile">
              <input type="submit" value="upload" name="upload" />  
            </div>
        </fieldset>
            
                       <!--Upload Files-->
    <?php
    
     if (isset($_POST['upload']) && $_FILES['userfile']['size'] > 0) {
    $fileName = $_FILES['userfile']['name'];
    $tmpName = $_FILES['userfile']['tmp_name'];
    $fileSize = $_FILES['userfile']['size'];
    $fileType = $_FILES['userfile']['type'];
    $fileType = (get_magic_quotes_gpc() == 0 ? $_FILES['userfile']['type'] : mysql_real_escape_string(
                            stripslashes($_FILES['userfile'])));
    $fp = fopen($tmpName, 'r');
    $content = fread($fp, filesize($tmpName));
    $content = addslashes($content);
    fclose($fp);
    if (!get_magic_quotes_gpc()) {
        $fileName = addslashes($fileName);
    }
    $con = mysqli_connect('localhost', 'root', '' , 'testdb') or die(mysql_error());
    if ($con) {
        $query = "INSERT INTO upload (name, size, type, content ) " .
                "VALUES ('$fileName', '$fileSize', '$fileType', '$content')";
        mysqli_query($con,$query) or die('Error, query failed');
        mysqli_close($con);
        echo "<br>File $fileName uploaded<br>";
    } else {
        echo "file upload failed";
    }
}

?>
      </form>
        
                                              <!-- Upload -->
<?php
    //Step1 connection to datbase
    $con = mysqli_connect("localhost","root","","testdb")or die('Error connecting to MySQL server.');
   
    
    //upload:


if(@$_POST['submit'])
{
    //storing all necessary data into the respective variables.
$file = $_FILES['file'];
$file_name = addslashes($file['name']);
$file_type = $file ['type'];
$file_size = getimagesize($file['tmp_name']);
$file_path = addslashes(file_get_contents($file ['tmp_name']));
$file_path = base64_encode($file_path);
move_uploaded_file ($file_path,'uploads/'.$file_name);
if($file_size ==false)
{
    echo "not an image";
}
    else
    {
if(!$query=mysqli_query($con,"insert into uploads(name,image) values('$file_name','$file_path')"))
        {
            echo "error";
        }
        else
        {
            echo "uploaded";
        }
    }
}
            $result = mysqli_query($con,"select * from uploads");
            $row = mysqli_fetch_array($result);
            echo ' ';
        
       
    

?>      
         <!--live feeD -->
  
<?php
$db = mysqli_connect('localhost', 'root', '','testdb') or die ("error");
?>
  

<h2 style="color:black;">Fresh <span>News</span></h2>
      <ul class="news">
        <?php
$query = "SELECT id, headline, timestamp, story FROM news ORDER BY timestamp DESC LIMIT 5";
$result = mysqli_query($db,$query);
if(!$result){
   echo('Error selecting news: ' . $mysql_error());
   exit();
}
if (mysqli_num_rows($result) >0){
    while($row = mysqli_fetch_object($result))
    {
    ?>
        
   <?php  //$cont=($row->timestamp); 
          $news=($row->headline);
          $story=($row->story);
   ?>

            <li><strong style="color:black"><?php echo "$news"." "?><a class="blink" href="shownews.php" style="color:#ff1a1a; font-size:8px;">Click here</a></strong>
           </li>
        
      
      
         
      
  <?php
}}
    else{
   
    }


?>    
      </ul>   
            
      </aside>

        
    <section id="content">
    
      
               <!--logout system -->
    <?php 
echo '  <div id="banner">
        <h2>You Sucessfully<span>Loged In</span></h2>
      </div>';
            
echo '<span style="font-size:20px; float:right;"><a href="logout.php">Logout</span></a>';
            
            
    ?>
          
        <!--end of logout system -->
     
        
           <?php
     $db= mysqli_connect('localhost','root','','testdb')
             or die('Error connecting to MySQL server.');
             
    
    if(isset($_POST['submit_form']))
    {

        $content=mysqli_real_escape_string($db,$_POST["content"]);
    
             if(mysqli_query($db,"insert into article (message) values('$content')"))
             {
             echo "<script>alert('uploaded')</script>";
    }
        else
        {
            echo "<script>alert('error')</script>";
        }
    }
        ?>
        
        <!--
<h2>Upload<span> Article</span></h2>
        <form id="contacts-form" action="#" method="post">
             <div class="field extra">
              <label>Copy Text Here:</label>
              <textarea cols="1" rows="1" name="content"></textarea>
            </div>
            <div class="alignright"><input type="submit" name="submit_form" value="submit."></div>
        </form>
-->             
        
        
     
   

        
            
    
