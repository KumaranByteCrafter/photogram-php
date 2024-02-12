<?php
include "libs/load.php";
?>
<!doctype html>
<?php load_template('_head');?>
<html lang="en">
  
  <body>
  <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .form-signinup {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

    .form-signinup .checkbox {
    font-weight: 400;
    }

    .form-signinup .form-floating:focus-within {
    z-index: 2;
    }

    .form-signinup input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    border-top-left-radius: 0;
    border-top-right-radius: 0
    }

    .form-signinup input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    }
    .form-signinup input[name="phone"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    }
    .form-signinup input[name="username"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
   
    }
</style>
    <?php load_template('_header')?>
<main>
<?php load_template('_signup')?>
</main>
<?php load_template('__footer') ?>
<script src="/app/assets/dist/js/bootstrap.bundle.min.js"></script>
      
  </body>
</html>
