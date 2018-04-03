<?php
	session_start(); 
	session_destroy();
	$_SESSION = [];
?>
<script>
	window.location.href='index.php';
</script>
