<?php
include('header.php');

?>
		<div class="content">
			<h2>Edit Post</h2>
			<form action="">
				<table class="">
					<tr>
						<td>Title</td>
						
					</tr>
					<tr>
						<td><input class="long" type="text" name="" value="Retro Photos"></td>
					</tr>
					<tr>
						<td>Descriptions</td>
					</tr>
					<tr>
						<td>
							<textarea name="description" cols="30" rows="10">Put your description here.Put your description here.Put your description here.Put your description here.Put your description here.Put your description here.Put your description here.Put your description here.Put your description here.Put your description here.Put your description here.Put your description here.Put your description here.Put your description here.Put your description here.Put your description here.Put your description here.Put your description here.Put your description here.Put your description here.Put your description here.Put your description here.Put your description here.Put your description here.Put your description here.</textarea>
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
		var editor = CKEDITOR.replace( 'description' );
		
	}

</script>
						</td>
						</tr>
				 
						<td>Previous Image Preview</td>
						
					</tr>
					<tr>
						<td><img src="" alt=""></td>
					</tr>
					</tr>
				 
						<td>Add Image</td>
						
					</tr>
					<tr>
						<td><input type="file" name=""></td>
					</tr>

					<tr><td>Select Category</td></tr>
					<tr>
						<td>
							<input type="checkbox" name="">&nbsp;Technology
							<input type="checkbox" name="">&nbsp;Technology
							<input type="checkbox" name="">&nbsp;Technology
						</td>
					</tr>
					<tr><td>Select Tags</td></tr>
					<tr>
						<td>
							<input type="checkbox" name="">&nbsp;Technology
							<input type="checkbox" name="">&nbsp;Technology
							<input type="checkbox" name="">&nbsp;Technology
						</td>
					</tr>
					
				
					<tr>
						
						<td><input type="submit" value="UPDATE" name=""></td>
					</tr>
				</table>
			</form>

			

<?php
include('footer.php');

?>