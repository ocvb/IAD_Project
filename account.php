<!DOCTYPE html>
<html lang="en">

<head>
   <title>Document</title>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="css/style.css" type="text/css">
   <link rel="stylesheet" href="css/home.css" type="text/css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" type="text/css">


   <script type="module">
      import { getCookie } from "./js/cookies.js";

      $(document).ready(function() {
         function checklogin() {
            if (getCookie("user") == '') {
               $.post("cookies.php");
               window.location.reload();
            }

            if (getCookie("user") != "notlogged") {
               
               document.querySelector("#login").href = "javascript:logout();";
               document.querySelector("#login").id = "logout";
               if (getCookie("adStatus") == 'yes') {
                  $('.navaddpage').append('<li class="nav-item"><a class="nav-link active" href="admin.php">Admin</a></li>');
               }
            } else {
               window.location.href = "login.php";
            }

            $.post("admin_check.php");

         }
         checklogin();

         /*if (sessionStorage.getItem('user') == 'notlogged') {
            document.querySelector("#para").textContent = "test test";
         }*/

      });
   </script>
</head>

<body>
   <div id="preloader"></div>
   <!--TODO: Header, Nav, Article, Aside-->
   <nav>
      <ul class="nav d-flex justify-content-center fixed-top navaddpage">
         <li class="nav-item"><a class="nav-link active" href="index.html">Home</a></li>
         <li class="nav-item"><a class="nav-link" href="course.php">Course</a></li>
         <li class="nav-item"><a class="nav-link" href="account.php"><i class="fa-solid fa-user"></i></a></li>
      </ul>
   </nav>


   <div class="d-flex align-items-center h-100">
      <div class="container position-relative float-left" data-aos="zoom-in" data-aos-delay="100">
         <ul class="text-white list-unstyled">
            <li class="nav-item">- <a href="#">Account Details</a></li>
            <li class="nav-item">- <a href="#">Order</a></li>
            <li class="nav-item">- <a id="login" href="#">Logout</a></li>
         </ul>
      </div>
   </div>

   <div>

   </div>

   <footer class="py-5 bg-dark">
      <div class="container">
         <p class="m-0 text-center text-white">Copyright &copy; ITE 2022</p>
      </div>
   </footer>



   <!--javascript-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
   <script src="js/script.js"></script>
   <script>
      function logout() {
         $.post("cookies.php");
         window.location.reload();
      }
   </script>
</body>

</html>