<!DOCTYPE html>
<html lang="en">
<head>
<title>Student's Site | Articles</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
</head>
<body id="page3">
<!-- START PAGE SOURCE -->
<div class="wrap">
  <header>
    <div class="container">
      <h1><a href="#">Student's site</a></h1>
      <nav>
        <ul>
         <?php echo ' <li><a href="index1.php" class="m1">Home Page</a></li>' ?>
         <?php echo ' <li><a href="about-us.php" class="m2">About Us</a></li>' ?>
         <?php echo ' <li class="current"><a href="articles.php" class="m3">Our Articles</a></li>' ?>
         <?php echo ' <li><a href="contact-us.php" class="m4">Contact Us</a></li>' ?>
         <?php echo ' <li class="last"><a href="sitemap.php" class="m5">Login</a></li>' ?>
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
        <li><span><a href="programs.php">Programs</a></span></li>
        <li><span><a href="members.php">Members</a></span></li>
        <li><span><a href="#">Teachers</a></span></li>
        <li><span><a href="#">Administrators</a></span></li>
        <li><span><a href="#">Basic Information</a></span></li>
      </ul>
      
        <?php
//Step1 connection to datbase

    $db = mysqli_connect('localhost','root','','testdb')
 or die('Error connecting to MySQL server.');
    echo"Sucessfully connected to database";
    
    
    //newsletter subscription:
    
    if(isset($_POST['submit_form']))
{
 $name=$_POST["user_name"];
 $email=$_POST["email"];
 
 mysqli_query($db,"insert into newsletter_signups values('','$name','$email')");
 echo "<script>alert('Thanks For Joining Us')</script>";
}
?>
        <form action="#" id="newsletter-form" method="post">
        <fieldset>
          <div class="rowElem">
            <h2>Newsletter</h2>
            <input type="text" name="user_name"  placeholder="Enter Your Name"/>
            <input type="email" name="email"  placeholder="Enter Your Email Id"/>
            <input type="submit" value="Subscribe" name="submit_form"/>
            </div>
        </fieldset>
            <?php
     $m;
    ?>
     
 <!--live feeD -->
  
<?php
$db = mysqli_connect('localhost', 'root', '','testdb') or die ("error");
?>
  

<h2 style="color:black; padding-top:80px">Fresh <span>News</span></h2>
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
      <div id="banner">
        <h2>PRISM-ELITE Professional <span>Online Education <span></span></span></h2>
      </div>
      <div class="inside">
        <h2>Articles</h2>
        <ul class="articles">
          <li><img src="images/icon1.png">
              <h4 style="font-size:25px"><a href="article1.php"><b>Click Here to go to Articles</b></a></h4>
         </li>
          
        </ul>
      </div>
    </section>
  </div>
</div>
<footer>
  <div class="footerlink">
    
    <div style="clear:both;"></div>
  </div>
</footer>
<script type="text/javascript"> Cufon.now(); </script>
<!-- END PAGE SOURCE -->
    
    
</body>
</html>
