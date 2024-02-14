<?php
$signup = false;
if(isset($_POST['username']) and isset($_POST['password']) and  isset($_POST['email_address']) and isset($_POST['phone'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email_address'];
  $phone = $_POST['phone'];
  $error = signup($username,$password,$email,$phone);
  $signup = true;
} 
?>
<main class="form-signinup">
  <?php
  if($signup){
    if(!$error){
      ?>
      <main class="container">
        <div class="container bg-light p-5 rounded mt-3">
          <h1>Signup Success</h1>
          <p class="lead">Now can login from <a href="/app/login.php">here</a></p>
        </div>
      </main>
  <?php
  }
    else{
    ?>
    <main class="container">
      <div class="container bg-light p-5 rounded mt-3">
        <h1>Signup Failed</h1>
        <p class="lead">Something went wrong, <?php echo $error ?></p>
      </div>
     </main>
    <?php
   }
  }else{
  ?>
  <form method="post" action="signup.php">
    <img class="mb-4" src="https://t4.ftcdn.net/jpg/02/78/07/51/360_F_278075188_zrkZNIOrqjAQSA2xDRFQ4H0CfzVmkQyZ.jpg" alt="" width="92" height="75">
    <h1 class="h3 mb-3 fw-normal">Signup here</h1>
    <div class="form-floating">
      <input name="username" type="text" class="form-control" id="floatingInputUsername" placeholder="name@example.com">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input name="phone" type="text" class="form-control" id="floatingInputUsername" placeholder="name@example.com">
      <label for="floatingInput">Phone</label>
    </div>
    <div class="form-floating">
      <input name="email_address" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input name = "password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  </form>
</main>
<?php } ?>