<?php
include_once "../db.php";

$email = $_COOKIE['user'];
$query = "SELECT `regid`, `name`, `course`, `email`, `hp_no`, `reg_date` FROM members WHERE email = '$email'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

function td($i)
{
   return "<td>$i</td>";
}
?>

<script>
   $(document).ready(function () {
      
   })
</script>

<div class="container-fluid dynamic-table justify-content-center">
   <nav class="border">
      <ul class="nav list-unstyled bg-transparent">
         <li class="nav-item account-item"><a id='id' class="nav-link" href="#">View</a></li>
         <li class="nav-item account-item"><a class="nav-link" href="#">Delete</a></li>
         <li class="nav-item account-item"><a class="nav-link" href="#">Update</a></li>
      </ul>
   </nav>

   <div class="data border text-white">
      <!--echo "<tr>".td($row['regid']). td($row['name']). td($row['course'])."</tr>";-->
      <div class="row">
         <div class="col-sm">
            <div><?php echo $row['regid']; ?></div>
         </div>
         <div class="col-sm">
            <div><?php echo $row['name']; ?></div>
         </div>
         <div class="col-sm">
            <div><?php echo $row['course']; ?></div>
         </div>
         <div class="col-sm">
            <div><?php echo $row['email']; ?></div>
         </div>
         <div class="col-sm">
            <div><?php echo $row['hp_no']; ?></div>
         </div>
      </div>
   </div>
</div>

