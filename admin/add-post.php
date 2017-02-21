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
			if (empty($_POST['tag_id'])) {
				
				throw new Exception("Tag Name can not be Empty");
				
			}


			$statement = $db->prepare("SHOW TABLE STATUS LIKE 'table_post'");
			$statement->execute();
			$result = $statement->fetchAll();
			foreach($result as $row)
				$new_id = $row[10];
				
		
		$up_filename=$_FILES["post_image"]["name"];
		$file_basename = substr($up_filename, 0, strripos($up_filename, '.')); // strip extention
		$file_ext = substr($up_filename, strripos($up_filename, '.')); // strip name
		$f1 = $new_id . $file_ext;

		if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif'))
			throw new Exception("Only jpg, jpeg, png and gif format images are allowed to upload.");

		move_uploaded_file($_FILES["post_image"]["tmp_name"],"../uploads/" . $f1);


			

			$tag_id = $_POST['tag_id'];

			$i=0;
			foreach ($tag_id as $key => $val) {
				$arr[$i]=$val;
				
				$i++;
			}



			$tag_ids = implode(",",$arr);
			


			$post_date = date('Y-m-d');
			$post_timestamp = strtotime(date('Y-m-d'));
			$year = substr($post_date,0,4);
			$month = substr($post_date,5,2);

		
			$statement = $db->prepare("INSERT INTO table_post (post_title,post_description,post_image,cat_id,tag_id,post_date,year,month,post_timestamp) VALUES (?,?,?,?,?,?,?,?,?)");
			$statement->execute(array($_POST['post_title'],$_POST['post_description'],$f1,$_POST['cat_id'],$tag_ids,$post_date,$year,$month,$post_timestamp));

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
			<form action="" method="post" enctype="multipart/form-data">
				<table class="">
					<tr>
						<td>Title</td>
					</tr>

					<?php
						if (isset($error_message)) {
							echo "<div style='color:red;'>".$error_message."</div>";
						}
						if (isset($success_message)) {
							echo "<div style='color:green;'>".$success_message."</div>";
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
				
						<td>Featured Image</td>
						
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
							<input type="checkbox" name="tag_id[]" value="<?php echo $row['tag_id'];?>">&nbsp;<?php echo $row['tag_name'];?>

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