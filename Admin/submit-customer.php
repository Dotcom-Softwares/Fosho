<?php
/*  Azhar Coded*/
include('include/autoLoad.php');
$under = new customerClass();
$create = $under -> customerreg($_POST);

?>
<script>window.location = 'customer-Entry.php?msg = <?php echo $create; ?>';</script>