<?php
include_once "db.php";

?>

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
      crossorigin="anonymous"></script>
   <link rel="stylesheet" href="css/style.css" type="text/css">
   
   <script type="module">
      import { getCookie } from "./js/cookies.js";

      sessionStorage.setItem("user", "notlogged");
      $(document).ready(function () {
         if (getCookie("user") == '') {
            $.post("cookies.php");
         }

         $.post("admin_check.php");
         if (getCookie("user") != "notlogged") {
            document.querySelector("#login").innerHTML = "Logout";
            document.querySelector("#login").href = "javascript:logout();";
            document.querySelector("#login").id = "logout";
         }

         if (getCookie("adStatus") == 'yes') {
            document.querySelector(".navaddpage").innerHTML += '<a class="nav-item nav-link" href="admin.php">Admin</a>';
         }
      });
   </script>
</head>

<body>
   <!--TODO: Header, Nav, Article, Aside-->
   <nav class="navbar navbar-light justify-content-center">
      <div class="navaddpage">
         <a class="nav-item nav-link active" href="index.html">Home</a>
         <a class="nav-item nav-link" href="order.php">Order</a>
         
         <a class="nav-item nav-link" id="login" href="login.php">Login</a>
      </div>
   </nav>
   <header class="navbar justify-content-center">
      <div>
         <p>ruhe</p>
      </div>
   </header>
</body>

</html>