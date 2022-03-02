<?php
include_once "db.php";

$dbarray = array('name', 'course', 'email', 'hp_no', 'reg_date');

$current = $_COOKIE['user'];
$q = "SELECT * FROM members WHERE email = '$current'";
$result = mysqli_query($db, $q);
$row = mysqli_fetch_array($result);

$p = 0;
$jsql = "SELECT * FROM code WHERE id = 1";
$cresult = mysqli_query($db, $jsql);
$coderow = mysqli_fetch_array($cresult);

function td($i)
{
   return "<td>$i</td>";
}

?>

<head>
   <title>Document</title>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" type="text/css">
   <link rel="stylesheet" href="./css/style.css" type="text/css">
   <link rel="stylesheet" href="./css/account.css" type="text/css">


   <script type="module">
      import {
         getCookie
      } from "./js/cookies.js";

      $(document).ready(function() {
         function checklogin() {
            if (getCookie("user") == '') {
               $.post("cookies.php");
               window.location.reload();
            }

            if (getCookie("user") != "notlogged") {
               document.querySelector("#logout").href = "javascript:logout();";
               <? if ($row['administrator'] == 'yes' && $row['email'] == $current) $p = 1; ?>
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
      <ul class="nav d-flex justify-content-center fixed-top navaddpage" id="navaddpage">
         <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
         <li class="nav-item"><a class="nav-link" href="course.php">Course</a></li>
         <li class="nav-item"><a class="nav-link nav-current" href="account.php"><i class="fa-solid fa-user"></i></a></li>
      </ul>
   </nav>

   <div class="container-bg">
      <div class="container py-5">
         <div class="navbar">
            <ul class="navbar list-unstyled" id='accountpage'>
               <li class="nav-item account-item active">
                  <a class="nav-link fw-bold" href="javascript:accountDetails();">Account Details</a>
               </li>
               <li class="nav-item account-item">
                  <a class="nav-link" id="logout" href="#">Logout</a>
               </li>
               <? print ($p == 1) ? $coderow['jcode'] : null; ?>
            </ul>
         </div>

         <div class="container d-flex account-details justify-content-center" style="display: none;">
            <table class="table text-white text-center w-50">
               <tr>
                  <td scope="col">Name</td>
                  <td scope="col">Course</td>
                  <td scope="col">Email</td>
                  <td scope="col">Phone</td>
                  <td scope="col">Date</td>
               </tr>
               <?php echo "<tr>" . td($row[$dbarray[0]]) . td($row[$dbarray[1]]) . td($row[$dbarray[2]]) . td($row[$dbarray[3]]) . td($row[$dbarray[4]]) . "</tr>"; ?>
            </table>

            <!--Test-->
            <aside style="display:none">
               <div class="container d-flex text-white">
                  <p>EE</p>
               </div>
            </aside>
         </div>
         <div class="container payload py-5"></div>
      </div>
   </div>

   <footer class="footer">
      <div class="container">
         <p class="text-center text-white">Copyright &copy; ITE 2022. All rights Reserved.</p>
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


      function accountDetails() {
         $(".account-details").show();
      }

      function admin() {
         location.href = "./adminpages/admin.php";
         //$(".payload").load("admin.php");
      }

      /*function test() {
         var text = '<p>YEAYAYA</p>'
         return this.innerHTML = "fefe";
      }*/
      function test() {
         return `<p>YEAYAYA</p>`;
      }
   </script>
</body>

</html>