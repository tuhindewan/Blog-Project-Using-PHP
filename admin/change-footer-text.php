<?php
ob_start();
session_start();
if($_SESSION['name']!='admin')
{
	header('location: login.php');
}
?>

<?php
include('header.php');

?>
		<div class="content">
			<h2>Change Footer Text</h2>
			<form action="">
				<table class="table1">
					<tr>
						<td>Footer text:</td>
						
					</tr>
					<tr>
						<td><input class="long" type="text" name="" value="created by Md. Saiduzzaman Tohin"></td>
					</tr>
					<tr>
						
						<td><input type="submit" value="SAVE" name=""></td>
					</tr>
				</table>
			</form>
			
		</div>

<?php
include('footer.php');

?>