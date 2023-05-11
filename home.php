<?php include 'inc/header.php';?>
<link rel="stylesheet" href="inc/nav.css">
<link rel="stylesheet" href="CSS/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<section class="content">
    <section class="content-header">
        <h3  >Feedback</h3>
        <p>Leave feedback for <span style="color: #6610f2;"> <a href="https://royal-edu.vercel.app/">Royal.edu</a>   </span></p>
    </section>
      
    <section class="feedback_form">
      <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control <?php echo !$nameErr ?:
          'is-invalid'; ?>" name="name" id="name" placeholder="Enter your name" value="<?php echo $name; ?>">
             
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control <?php echo !$emailErr ?:
          'is-invalid'; ?>" name="email" id="email" placeholder="Enter your email" value="<?php echo $email; ?>">
            
        </div>
        <div class="mb-3">
            <label for="feedback" class="form-label">Feedback</label>
            <textarea class="form-control <?php echo !$feedbackErr ?:
          'is-invalid'; ?>" name="feedback" id="feedback" rows="3" placeholder="Enter your feedback" value="<?php echo $name; ?>"></textarea>
             
        </div>
        <div class="col-auto">
        <input type="submit" name="submit" value="Submit" class="btn">  
        </div>
      </form>
    </se_POSTction>
</section  >

<?php include 'inc/footer.php';?>
<?php
$name="";
$email="";
$feedback="";
$nameErr="";
$emailErr="";
$feedbackErr="";
$F='';
 

if(isset($_REQUEST['submit'])){
    if (empty($_REQUEST['name'])) {
      $nameErr="Please enter your name!";
    } elseif (empty($_REQUEST['email'])) {
       $emailErr="Please enter your email";
    } elseif(empty($_REQUEST['feedback'])){
      $feedbackErr="Please enter your feedback";
    } elseif (isset($_REQUEST['name']) && isset($_REQUEST['email']) && isset($_REQUEST['feedback'])) {
      $name=$_REQUEST['name'];
      $email=$_REQUEST['email'];
      $feedback=$_REQUEST['feedback'];
    
      $sql="INSERT INTO feedback (name,email,feedback) VALUES ('$name','$email','$feedback')";
      $result=mysqli_query($conn,$sql);
      $F=mysqli_fetch_all($result,MYSQLI_ASSOC);
      
    }
}

?>


 
 