<?php
/*  Azhar Coded*/
include('include/autoLoad.php');
$under = new usersClass();
$create = $under -> userupdate($_POST);

?>
<script>window.location = 'showUsers.php?msg = <?php echo $create; ?>';</script>