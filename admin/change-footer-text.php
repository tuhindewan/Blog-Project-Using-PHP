<?php
ob_start();
session_start();
if($_SESSION['name']!='admin')
{
	header('location: login.php');
}
include("../connection.php");
?>

<?php
if(isset($_POST['save'])) {
	
	try {
	
		if(empty($_POST['footer_text'])) {
			throw new Exception("Footer Text can not be empty");
		}
		
		$statement = $db->prepare("UPDATE table_footer SET description=? WHERE id=1");
		$statement->execute(array($_POST['footer_text']));
		
		$success_message = "Footer text is updated successfully.";
		
	
	}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
	
	
}
?>

<?php


		$statement = $db->prepare("SELECT * FROM table_footer WHERE id=1");
	    $statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row){

			$description = $row['description'];
		}

?>

<?php
include('header.php');

?>
		<div class="content">
			<h2>Change Footer Text</h2>

			<?php
if(isset($error_message)) {echo "<div class='error'>".$error_message."</div>";}
if(isset($success_message)) {echo "<div class='success'>".$success_message."</div>";}
?>
			<form action="" method="post">
				<table class="table1">
					<tr>
						<td>Footer text:</td>
						
					</tr>
					<tr>
						<td><input class="long" type="text" name="footer_text" value="<?php echo $description;?>"></td>
					</tr>
					<tr>
						
						<td><input type="submit" value="SAVE" name="save"></td>
					</tr>
				</table>
			</form>
			
		</div>

<?php
include('footer.php');

?>