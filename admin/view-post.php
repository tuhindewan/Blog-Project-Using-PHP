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
include('header.php');

?>
		<div class="content">
			<h2>View All Posts</h2>
			
			<table class="table2" width="100%">

			<tr>
				<th width="5%">Serial</th>
				<th width="65%">Title</th>
				<th width="30%">Action</th>
			</tr>

			<?php

			$i = 0;
		$statement = $db->prepare("SELECT * FROM table_post ORDER BY post_id DESC");
	    $statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row){

					$i++;
				?>
<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $row['post_title'];?></td>
				<td><a class="fancybox" href="#inline<?php echo $i;?>" >View</a>
				<div id="inline<?php echo $i;?>" style="width: 700px; display: none;">
					<h3 style="border-bottom: 2px solid #808080; margin-bottom: 10px;">View All Data</h3>
					<p>
						<form action="" method="post"> 
							<table>
								<tr>
									<td><b>Title</b></td>
								</tr>
								<tr>
									<td><?php echo $row['post_title'];?></td>
								</tr>
								<tr>
									<td><b>Description</b></td>
								</tr>
								<tr>
									<td><?php echo $row['post_description'];?></td>
								</tr>
								<tr>
									<td><b>featured Image</b></td>
									<td><img src="../uploads/<?php $row['post_image'];?>" alt=""></td>
								</tr>
								<tr>
									<td>
										<?php


							$statement1 = $db->prepare("SELECT * FROM table_category WHERE cat_id=?");
						    $statement1->execute(array($row['cat_id']));
							$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
							foreach($result1 as $row1){

								echo $row1['Cat_name'];
							}


										?>
									</td>
								</tr>
								
								<tr>
									<td><b>Tags</b></td>
								</tr>
								<tr>
									<td>
											<?php

								$arr = explode(",",$row['tag_id']);
								$count_arr = count(explode(",",$row['tag_id']));
								$k=0;
								for($j=0;$j<$count_arr;$j++)
								{
									
									$statement1 = $db->prepare("SELECT * FROM table_tag WHERE tag_id=?");
									$statement1->execute(array($arr[$j]));
									$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
									foreach($result1 as $row1)
									{
										$arr[$k] = $row1['tag_name'];
									}
									$k++;
								}
								$tag_names = implode(",",$arr);
								echo $tag_names;
								?>
									</td>
								</tr>
								<tr>
									<td><input type="submit" value="UPDATE" name=""></td>
								</tr>
							</table>
						</form>
					</p>
				</div>
				&nbsp;|&nbsp;
				<a href="post-edit.php">Edit</a>
				&nbsp;|&nbsp;
				 <a onclick="return confirmDelete();" href="">Delete</a> </td>
			</tr>
			

				<?php

		}

			?>

			
			
			</table>
			
		</div>

<?php
include('footer.php');

?>