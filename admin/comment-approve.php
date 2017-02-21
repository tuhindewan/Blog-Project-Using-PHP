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
					<td>
					<a class="fancybox" href="#inline<?php echo $i;?>" ><?php echo $row['post_id'];?></a>

					<div id="inline<?php echo $i;?>" style="width: 700px; display: none;">
					<h3 style="border-bottom: 2px solid #808080; margin-bottom: 10px;">View Post Details</h3>
					<p>
					<?php
					$statement1 = $db->prepare("SELECT * FROM table_post WHERE post_id=?");
	   				$statement1->execute(array($row['post_id']));
					$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
					foreach($result1 as $row1){
						?>

						<table>
								<tr>
									<td><b>Title</b></td>
								</tr>
								<tr>
									<td><?php echo $row1['post_title'];?></td>
								</tr>
								<tr>
									<td><b>Description</b></td>
								</tr>
								<tr>
									<td><?php echo $row1['post_description'];?></td>
								</tr>
								<tr>
									<td><b>featured Image</b></td>
									<td><img src="../uploads/<?php echo $row1['post_image'];?>" alt="" width="200"></td>
								</tr>
								<tr>
									<td>
										<?php


							$statement2 = $db->prepare("SELECT * FROM table_category WHERE cat_id=?");
						    $statement2->execute(array($row1['cat_id']));
							$result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);
							foreach($result2 as $row2){

								echo $row2['Cat_name'];
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

								$arr = explode(",",$row1['tag_id']);
								$count_arr = count(explode(",",$row1['tag_id']));
								$k=0;
								for($j=0;$j<$count_arr;$j++)
								{
									
									$statement2 = $db->prepare("SELECT * FROM table_tag WHERE tag_id=?");
									$statement2->execute(array($arr[$j]));
									$result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);
									foreach($result2 as $row2)
									{
										$arr1[$k] = $row2['tag_name'];
									}
									$k++;
								}
								$tag_names = implode(",",$arr1);
								echo $tag_names;
								?>
									</td>
								</tr>
								
							</table>

					<?php	
					}
					?>
						 
							
						
					</p>
				</div>


					</td>
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
					<td>
					<a class="fancybox" href="#inline<?php echo $i;?>" ><?php echo $row['post_id'];?></a>

					<div id="inline<?php echo $i;?>" style="width: 700px; display: none;">
					<h3 style="border-bottom: 2px solid #808080; margin-bottom: 10px;">View Post Details</h3>
					<p>
					<?php
					$statement1 = $db->prepare("SELECT * FROM table_post WHERE post_id=?");
	   				$statement1->execute(array($row['post_id']));
					$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
					foreach($result1 as $row1){
						?>

						<table>
								<tr>
									<td><b>Title</b></td>
								</tr>
								<tr>
									<td><?php echo $row1['post_title'];?></td>
								</tr>
								<tr>
									<td><b>Description</b></td>
								</tr>
								<tr>
									<td><?php echo $row1['post_description'];?></td>
								</tr>
								<tr>
									<td><b>featured Image</b></td>
									<td><img src="../uploads/<?php echo $row1['post_image'];?>" alt="" width="200"></td>
								</tr>

								<tr>
							<td><b>Category</b></td>
								</tr>

								<tr>
									<td>
										<?php


							$statement2 = $db->prepare("SELECT * FROM table_category WHERE cat_id=?");
						    $statement2->execute(array($row1['cat_id']));
							$result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);
							foreach($result2 as $row2){

								echo $row2['Cat_name'];
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

								$arr = explode(",",$row1['tag_id']);
								$count_arr = count(explode(",",$row1['tag_id']));
								$k=0;
								for($j=0;$j<$count_arr;$j++)
								{
									
									$statement2 = $db->prepare("SELECT * FROM table_tag WHERE tag_id=?");
									$statement2->execute(array($arr[$j]));
									$result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);
									foreach($result2 as $row2)
									{
										$arr1[$k] = $row2['tag_name'];
									}
									$k++;
								}
								$tag_names = implode(",",$arr1);
								echo $tag_names;
								?>
									</td>
								</tr>
								
							</table>

					<?php	
					}
					?>
						 
							
						
					</p>
				</div>


					</td>
					
				</tr>

				<?php
				}	

				?>
				</table>
			
		</div>

<?php
include('footer.php');

?>