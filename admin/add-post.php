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

if (isset($_POST['form_save'])) {
	
	try{

			if (empty($_POST['post_title'])) {
				
				throw new Exception("Title can not be Empty");
				
			}
			if (empty($_POST['post_description'])) {
				
				throw new Exception("Descriptions can not be Empty");
				
			}
			if (empty($_POST['cat_id'])) {
				
				throw new Exception("Category Name can not be Empty");
				
			}
				if (empty($_POST['tag_in'])) {
				
				throw new Exception("Tag Name can not be Empty");
				
			}

			$success_message = "Post is inserted Successfully";

	}


	catch(Exception $e){

		$error_message = $e->getMessage();
	}
}




?>


<?php
include('header.php');

?>
		<div class="content">
			<h2>Add New Post</h2>
			<form action="" method="post">
				<table class="">
					<tr>
						<td>Title</td>
					</tr>

					<?php
					if (isset($error_message)) {
						echo $error_message;
					}

					?>
					<tr>
						<td><input class="long" type="text" name="post_title" value=""></td>
					</tr>
					<tr>
						<td>Descriptions</td>
					</tr>
					<tr>
						<td>
							<textarea name="post_description" cols="30" rows="10"></textarea>
							<script type="text/javascript">
	if ( typeof CKEDITOR == 'undefined' )
	{
		document.write(
			'<strong><span style="color: #ff0000">Error</span>: CKEditor not found</strong>.' +
			'This sample assumes that CKEditor (not included with CKFinder) is installed in' +
			'the "/ckeditor/" path. If you have it installed in a different place, just edit' +
			'this file, changing the wrong paths in the &lt;head&gt; (line 5) and the "BasePath"' +
			'value (line 32).' ) ;
	}
	else
	{
		var editor = CKEDITOR.replace( 'post_description' );
		
	}

</script>
						</td>
					</tr>
				
						<td>Add Image</td>
						
					</tr>
					<tr>
						<td><input type="file" name="post_image"></td>
					</tr>

					<tr><td>Select Category</td></tr>
					<tr>
						<td>
							<select name="cat_id">
							<option>Choose From Here</option>

							<?php



							$statement = $db->prepare("SELECT * FROM table_category ORDER BY Cat_name ASC");
						    $statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach($result as $row){

							?>
							<option value="<?php echo $row['cat_id'];?>"><?php echo $row['Cat_name'];?></option>

							<?php
							}

							?>

							

							</select>
						</td>
					</tr>
					<tr><td>Select Tags</td></tr>
					<tr>
						<td>
						<?php



							$statement = $db->prepare("SELECT * FROM table_tag ORDER BY tag_name ASC");
						    $statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach($result as $row){

							?>
							<input type="checkbox" name="tag_in" value="<?php $row['tag_id'];?>">&nbsp;<?php echo $row['tag_name'];?>

							<?php
							}

							?>

							
							
						</td>
					</tr>
					
				
					<tr>
						
						<td><input type="submit" value="SAVE" name="form_save"></td>
					</tr>
				</table>
			</form>

			</div>

<?php
include('footer.php');

?>