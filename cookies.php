<?php
setcookie("user", "notlogged", null, "/");
header("Location: ./index.html");
?>