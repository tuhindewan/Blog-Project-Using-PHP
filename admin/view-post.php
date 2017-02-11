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

			<tr>
				<td>1</td>
				<td>Retro Photos</td>
				<td><a class="fancybox" href="#inline1" >View</a>
				<div id="inline1" style="width: 700px; display: none;">
					<h3 style="border-bottom: 2px solid #808080; margin-bottom: 10px;">View All Data</h3>
					<p>
						<form action="" method="post"> 
							<table>
								<tr>
									<td><b>Title</b></td>
								</tr>
								<tr>
									<td>Retro Photos</td>
								</tr>
								<tr>
									<td><b>Description</b></td>
								</tr>
								<tr>
									<td>put your description.put your description.put your description.put your description.put your description.put your description.put your description.put your description.put your description.put your description.put your description.put your description.put your description.put your description.put your description.put your description.put your description.</td>
								</tr>
								<tr>
									<td><b>featured Image</b></td>
									<td><img src="" alt=""></td>
								</tr>
								<tr>
									<td><b>Category</b></td>
								</tr>
								<tr>
									<td>Technology, Computer, Bangladesh</td>
								</tr>
								<tr>
									<td><b>Tags</b></td>
								</tr>
								<tr>
									<td>Technology, Computer, Bangladesh</td>
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
			
			
			</table>
			
		</div>

<?php
include('footer.php');

?>