<?php
$username = $_POST['email_address'];
$password = $_POST['password'];
$result = validate_credential($username, $password );
if($result){
  ?>
  <main class="container">
  <div class="bg-light p-5 rounded mt-3">
  <h1>Login Success</h1>
  <p class="lead">Now can login from <a href="/app/">here</a> </p>
  </div>
  <?php
}
else{
?>
<main class="form-signin ">
  <form method="post" action="login.php">
    <img class="mb-4" src="https://t4.ftcdn.net/jpg/02/78/07/51/360_F_278075188_zrkZNIOrqjAQSA2xDRFQ4H0CfzVmkQyZ.jpg" alt="" width="92" height="75">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

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
<?php
}
?>