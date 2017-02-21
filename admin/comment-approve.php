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
if(isset($_REQUEST['id'])) {
	
	try {
	
		$statement = $db->prepare("UPDATE table_comment
		 SET active=1 WHERE c_id=?");
		$statement->execute(array($_REQUEST['id']));
		
		$success_message = "Comment Is Approved. Thank You.";
		
	
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
			<h2>All Un-approved Comments</h2>

			<?php
			if(isset($error_message)) {echo "<div class='error'>".$error_message."</div>";}
			if(isset($success_message)) {echo "<div class='success'>".$success_message."</div>";}
				?>

			<table class="table2" width="100%">

			<tr>
				<th width="">Serial</th>
				<th width="">Name</th>
				<th width="">Email</th>
				<th width="">URL</th>
				<th width="">Message</th>
				<th width="">Post ID</th>
				<th width="">Action</th>
			</tr>

			<?php

			$i = 0;
		$statement = $db->prepare("SELECT * FROM table_comment WHERE active=0 ORDER BY c_id DESC");
	    $statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row){

					$i++;
				?>
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $row['c_name'];?></td>
					<td><?php echo $row['c_email'];?></td>
					<td><?php echo $row['c_url'];?></td>
					<td><?php echo $row['c_message'];?></td>
					<td><?php echo $row['post_id'];?></td>
					<td><a href="comment-approve.php?id=<?php echo $row['c_id'];?>">Approve</a></td>
				</tr>

				<?php
				}	

				?>
				</table>

			<h2>All Approved Comments</h2>

			
			<table class="table2" width="100%">

			<tr>
				<th width="">Serial</th>
				<th width="">Name</th>
				<th width="">Email</th>
				<th width="">URL</th>
				<th width="">Message</th>
				<th width="">Post ID</th>
				
			</tr>

			<?php

			$i = 0;
		$statement = $db->prepare("SELECT * FROM table_comment WHERE active=1 ORDER BY c_id DESC");
	    $statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row){

					$i++;
				?>
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $row['c_name'];?></td>
					<td><?php echo $row['c_email'];?></td>
					<td><?php echo $row['c_url'];?></td>
					<td><?php echo $row['c_message'];?></td>
					<td><?php echo $row['post_id'];?></td>
					
				</tr>

				<?php
				}	

				?>
				</table>
			
		</div>

<?php
include('footer.php');

?>