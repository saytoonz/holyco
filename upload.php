<!DOCTYPE html>
<html>
<head>
	<title>Upload and Display</title>

	<script src="js/jQuery 3.2.1.js "></script>
<style type="text/css">

</style>
</head>
<body>
<form method="post" action="#" enctype="multipart/form-data" id="uploadForm">
	<input type="file" name="file" id="file">
</form>

<script type="text/javascript">
		function filePreview(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e){
					$('#uploadForm + img').remove();
					$('#uploadForm').after('<img src="'+e.target.result+'" width="50%" height="50%" />');
				}
				reader.readAsDataURL(input.files[0]);
			}
		}

		$('#file').change(function(){
			filePreview(this);
		});
	</script>

</body>
</html>