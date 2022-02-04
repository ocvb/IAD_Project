<script>
   var storage = sessionStorage.getItem("user");
</script>

<?php
include_once "db.php";

$sql = "SELECT email, administrator FROM members";
$result = mysqli_query($db, $sql);
while ($row = mysqli_fetch_array($result)) {
   echo $row['email'];
   if ($row['email'] == $_COOKIE['user']) {
      setcookie("adStatus", 'yes', null, "/");
      return true;
   } else {
      setcookie("adStatus", 'no', null, "/");
   }

   if ($row['email'] == $_COOKIE['user']) {
      setcookie("adStatus", 'yes', null, "/");
      return true;
   } else {
      setcookie("adStatus", 'no', null, "/");
   }
}
?>
