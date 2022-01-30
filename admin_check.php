<?php
include_once "db.php";

$sql = "SELECT ID, email, administrator FROM members";
$result = mysqli_query($db, $sql);

while ($row = mysqli_fetch_assoc($result) > 0) {
   if ($row['email'] == $_COOKIE['user']) {
      setcookie("adStatus", 'yes', null, "/");
   } else {
      setcookie("adStatus", 'yes', null, "/");
   }

}
?>

<!--<head>
   <script src="js/jquery-3.6.0.min.js" type="application/javascript"></script>
   <script type="module">
      import { getCookie } from "./js/cookies.js";

      $(document).ready(function() {
         if (getCookie("user") == 'admin%40admin.com') {
         }
      });
      </script>
</head>-->