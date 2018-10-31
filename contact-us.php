<!DOCTYPE html>
<html lang="en">
 
<!-- Contact us php source code-->
          
        <?php
     $db= mysqli_connect('localhost','root','','testdb')
             or die('Error connecting to MySQL server.');
             
    
    if(isset($_POST['submit_form']))
    {
        $name=$_POST["your_name"];
        $email=$_POST["email"];
        $content=$_POST["content"];
    
             mysqli_query($db,"insert into users_data (id,user_email,user_message,user_name) values  ('','$email','$content','$name')");
             echo "<script>alert('Thanks for writing to us')</script>";
    }
    
    
    
    
    
    
    
    //newsletter subscription:
    
    if(isset($_POST['submit']))
{
 $name=$_POST["user_name"];
 $email=$_POST["email1"];
 
 mysqli_query($db,"insert into newsletter_signups values('','$name','$email')");
 echo "<script>alert('Thanks For Joining Us')</script>";
}

    
       
    ?>  
    

<head>
<title>Student's Site | Contact Us</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
</head>
<body id="page5">
<!-- START PAGE SOURCE -->
<div class="wrap">
  <header>
    <div class="container">
      <h1><a href="#">Student's site</a></h1>
      <nav>
        <ul>
           <?php echo '<li><a href="index1.php" class="m1">Home Page</a></li>' ?>
           <?php echo '<li><a href="about-us.php" class="m2">About Us</a></li>' ?>
           <?php echo '<li><a href="articles.php" class="m3">Our Articles</a></li>' ?>
           <?php echo '<li class="current"><a href="contact-us.php" class="m4">Contact Us</a></li>' ?>
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
        <li><span><a href="programs.php">Programs</a></span></li>
        <li><span><a href="members.php">Members</a></span></li>
          <li><span><a href="#">Teachers</a></span></li>
        <li><span><a href="#">Administrators</a></span></li>
        <li><span><a href="#">Basic Information</a></span></li>
      </ul>
      
        <form action="#" id="newsletter-form" method="post">
        <fieldset>
          <div class="rowElem">
            <h2>Newsletter</h2>
            <input type="text" name="user_name"  placeholder="Enter Your Name"/>
            <input type="email" name="email1"  placeholder="Enter Your Email Id"/>
            <input type="submit" value="Subscribe" name="submit"/>
            </div>
        </fieldset>
            <br>
            <br>
        </form>
            <?php
     
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
      <div id="banner">
        <h2>PRISM-ELITEProfessional <span>Online Education <span></span></span></h2>
      </div>
      <div class="inside">
            <h2>Our <span>Contacts</span></h2>
        <div class="address">
          <address>
          <strong>Zip Code:</strong>247001<br>
          <strong>City:</strong>Saharanpur<br>
          <strong>Mobile:</strong>xxxxxxx<br>
          <strong></strong>
          </address>
</div>
          
<h2>Contact <span>Us</span></h2>
        <form id="contacts-form" action="#" method="post">
          <fieldset>
            <div class="field">
              <label>Your Name:</label>
              <input type="text" name="your_name" >
            </div>
            <div class="field">
              <label>Your E-mail:</label>
              <input type="email" name="email">
            </div>
             <div class="field extra">
              <label>Your Message:</label>
              <textarea cols="1" rows="1" name="content"></textarea>
            </div>
            <div class="alignright"><input type="submit" name="submit_form" value="submit."></div>
          </fieldset>
        </form>
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
