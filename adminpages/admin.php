<?php
include_once "../db.php";

$email = $_COOKIE['user'];
$query = "SELECT `regid`, `name`, `course`, `email`, `hp_no`, `reg_date` FROM members WHERE email = '$email'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

function td($i) {
   return "<td>$i</td>";
}
?>

<div class="container-fluid dynamic-table justify-content-center">
   <nav>
      <ul class="nav list-unstyled bg-transparent">
         <li class="nav-item account-item"><a id='viewphp' class="nav-link" href="#">View</a></li>
         <li class="nav-item account-item"><a id="updatephp" class="nav-link" href="#">Update</a></li>
         <li class="nav-item account-item"><a id="deletephp" class="nav-link" href="#">Delete</a></li>
      </ul>
   </nav>
   <hr class="text-white">
   <div class="container data text-white view" style="display:none">
      <!--echo "<tr>".td($row['regid']). td($row['name']). td($row['course'])."</tr>";-->
      <div class="row">
         <div class="col">
            <div>ID</div>
         </div>
         <div class="col">
            <div>Name</div>
         </div>
         <div class="col">
            <div>Course</div>
         </div>
         <div class="col">
            <div>Email</div>
         </div>
         <div class="col">
            <div>Phone</div>
         </div>
      </div>
      <hr class="position-relative">
      <div class="row">
         <div class="col">
            <div><?php echo $row['regid']; ?></div>
         </div>
         <div class="col">
            <div><?php echo $row['name']; ?></div>
         </div>
         <div class="col">
            <div><?php echo $row['course']; ?></div>
         </div>
         <div class="col">
            <div><?php echo $row['email']; ?></div>
         </div>
         <div class="col">
            <div><?php echo $row['hp_no']; ?></div>
         </div>
      </div>
   </div>

   <div class="container data text-white delete" style="display:none">
      <!--echo "<tr>".td($row['regid']). td($row['name']). td($row['course'])."</tr>";-->
      <div class="row">
         <div class="col">
            <div>ID</div>
         </div>
         <div class="col">
            <div>Name</div>
         </div>
         <div class="col">
            <div>Course</div>
         </div>
         <div class="col">
            <div>Email</div>
         </div>
         <div class="col">
            <div>Phone</div>
         </div>
      </div>
      <hr class="position-relative">
      <div class="row">
         <div class="col">
            <div><?php echo $row['regid']; ?></div>
         </div>
         <div class="col">
            <div><?php echo $row['name']; ?></div>
         </div>
         <div class="col">
            <div><?php echo $row['course']; ?></div>
         </div>
         <div class="col">
            <div><?php echo $row['email']; ?></div>
         </div>
         <div class="col">
            <div><?php echo $row['hp_no']; ?></div>
         </div>
      </div>
   </div>

   <div class="container data text-white update" style="display:none">
      <!--echo "<tr>".td($row['regid']). td($row['name']). td($row['course'])."</tr>";-->
      <div class="row">
         <div class="col">
            <div>ID</div>
         </div>
         <div class="col">
            <div>Name</div>
         </div>
         <div class="col">
            <div>Course</div>
         </div>
         <div class="col">
            <div>Email</div>
         </div>
         <div class="col">
            <div>Phone</div>
         </div>
      </div>
      <hr class="position-relative">
      <div class="row">
         <div class="col">
            <div><?php echo $row['regid']; ?></div>
         </div>
         <div class="col">
            <div><?php echo $row['name']; ?></div>
         </div>
         <div class="col">
            <div><?php echo $row['course']; ?></div>
         </div>
         <div class="col">
            <div><?php echo $row['email']; ?></div>
         </div>
         <div class="col">
            <div><?php echo $row['hp_no']; ?></div>
         </div>
      </div>
   </div>
</div>

<script>
   $(document).ready(function() {
      $("#viewphp").click(function() {
         $(".view").show();
         $(".delete").hide();
         $(".update").hide();
      });
      $("#deletephp").click(function() {
         $(".view").hide();
         $(".delete").show();
         $(".update").hide();
      });
      $("#updatephp").click(function() {
         $(".view").hide();
         $(".delete").hide();
         $(".update").show();
      });
   })
</script>