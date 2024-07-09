<?php require_once('../config.php') ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">

<?php require_once('inc/header.php') ?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
    body {
      background-image: url('../img/banner/background.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }

    .card-body {
      background-color: white;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    .btn {
      width: 100%;
      font-size: 16px;
      font-weight: 600;
      background-color: #d61ae7;
      color: #fff;
      border-radius: 5px;
      border-color: #007bff;
    }

    .form-control {
      border-radius: 5px;
      font-size: 16px;
      font-weight: 600;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <script>
    start_loader()
  </script>

  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Content Management System</b></a>
    </div>
    <div class="card">
      <div class="card-body">
        <form id="login-frm" action="" method="post">
          <label class="input_label" for="email_field">Username</label>
          <div class="input-group mb-3">

            <input type="text" class="form-control" name="username" placeholder="Username">
          </div>
          <label class="input_label" for="password_field">Password</label>
          <div class="input-group mb-3">

            <input type="password" class="form-control" name="password" placeholder="Password">
          </div>
          <div class="text-center">
            <button type="submit" class="btn">LOGIN</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>

  <script>
    $(document).ready(function () {
      end_loader();
    })
  </script>
</body>

</html>