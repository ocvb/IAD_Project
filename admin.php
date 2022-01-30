<?php
include_once "db.php";


?>

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="css/style.css" type="text/css">
   <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
   
   <script src="js/jquery-3.6.0.min.js" type="application/javascript"></script>
   <script type="module">
      import { getCookie, logout } from "./js/cookies.js";
      $(document).ready(function() {
         if (getCookie("user") != "notlogged") {
            document.getElementById("login").href = "";
            document.getElementById("login").innerHTML = "Logout";
            document.getElementById("login").id = "logout";
         }
         document.getElementById("logout").addEventListener("click", function () {
            $.post("cookies.php");
         });

      });
   </script>
</head>

<body>
   <!--TODO: Header, Nav, Article, Aside-->
   <nav class="d-flex flex-row justify-content-center">
      <div class="p-2">Home</div>
      <div class="p-2"><a href="shop.php">Shop</a></div>
      <div class="p-2"><a id="login" href="login.php">Login</a></div>
   </nav>
   <header class="navbar justify-content-center">
      <div>
         <p>ruhe</p>
      </div>
   </header>
</body>

</html>