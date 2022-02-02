<?php
include_once "db.php";

//$sql = "INSERT INTO `members`(`name`, `phone`, `email`, `address`) VALUES ('john', 2132132, 'awefwune@gmail.com', 'address')"; mysqli_query($db, $sql);
if (isset($_COOKIE["user"]) == null) {
   setcookie("user", "notlogged", null, "/");
}

if (isset($_POST['submit'])) {
   $email = mysqli_escape_string($db, $_POST['email']);
   $password = mysqli_escape_string($db, md5($_POST['password']));
   $sql = "SELECT email, password FROM `members` WHERE email = '$email'";
   $result = mysqli_query($db, $sql);
   $row = mysqli_fetch_assoc($result);
   if ($password == $row['password'] && $email == $row['email']) {
      setcookie("user", $email, null, "/");
   }
   header("Location: ./index.html");
}

?>

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="css/style.css" type="text/css">
   <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
   <script src="js/bootstrap.js"></script>
   <script src="js/jquery-3.6.0.min.js"></script>
   <title>Login</title>
</head>

<body>
   <nav class="nav navbar-expand-lg navbar-light justify-content-center">
      <div class="navaddpage">
         <a class="nav-item nav-link active" href="index.html">Home</a>
         <a class="nav-item nav-link" href="shop.php">Shop</a>
         <a class="nav-item nav-link" id="login" href="#">Login</a>
      </div>
   </nav>

   <div class="main-container navbar justify-content-center">
      <div class="form-container row g-4">
         <h3 class="h3 text-center">Login Panel</h3>
         <div class="form-form">
            <form method="POST" class="col">
               <div class="top-form form-group">
                  <label for="">Email:</label>
                  <input type="email" name="email" class="form-control" placeholder="Email" required>
               </div>
               <div class="form-group">
                  <label for="">Password:</label>
                  <input type="password" name="password" class="form-control" placeholder="Password" required>
               </div>
               <div class="form-group loginstatus">
                  <?php
                  if (isset($_POST["submit"])) {
                     if (!$_POST["email"] == null || !$_POST["password"] == null) {
                        while ($row = mysqli_fetch_assoc($result)) {
                           if ($email == $row["email"] and $password == $row["password"]) {
                              echo "<p style='color: green;'>You have logged in</p>";
                           } else {
                              echo "<p style='color: red;'>Invalid login or password</p>";
                           }
                        }
                     } else {
                        print_r("<p style='color: red;'>Fields are empty!</p>");
                     }
                  }
                  ?>
               </div>
               <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-primary">Login</button>
               </div>
            </form>
            <div class="form-group">
               <p>Don't have an account? <a href="register.php">here</a>.</p>
            </div>
         </div>
      </div>
   </div>
</body>

</html>