<?PHP
session_start();
$user = $_SESSION['loan_user'];
$page = $_REQUEST['content'];
// to change a session variable, just overwrite it

if($user[0][0] == ""){
	require_once("modules/login/views/index.inc.php"); 
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once('views/head.inc.php') ?>
</head>
<body>
	<div id="wrapper" class="toggled">
		<?php require_once('views/header.inc.php') ?>
		
		<!-- Sidebar -->
		<?php require_once('views/menu.inc.php') ?>
		<!-- /#sidebar-wrapper -->

		<!-- Page Content -->
		<div id="page-content-wrapper">
			<?php require_once("views/body.inc.php"); ?>
		</div>
		<!-- /#page-content-wrapper -->
	</div>
	<!-- /#wrapper -->
	<script>
		function menu_toggle(){
			$("#wrapper").toggleClass("toggled");
		}
	</script>
</body>
</html> 
<?PHP }?>




