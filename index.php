<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.file-box{
			width: 24%;
			padding: 1%;
			float: left;
		}
		.box-content
		{
			box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0.12);
			background-color: #f1f1f1;
			padding: 0.01em 16px;
			padding-top: 16px;
			padding-bottom: 16px;
			margin: 0;
		}
		.box-content h5
		{
			font-size: 18px;
			font-weight: 400;
			margin: 10px 0;
		}
		.box-content .preview
		{
			width: 100px;
			height: 220px;
			margin: 20px 0;
		}
		/*.preview erbed{

		}*/
		.box-content .dwn
		{
			font-size: 16px;
			color: #fff !important;
			background-color: #4CAF50 !important;
			border: none;
			display: inline-block;
			outline: 0;
			padding: 6px 16px;
			vertical-align: middle;
			overflow: hidden;
			text-decoration: none !important;
			color: #fff;
			background-color: #000;
			text-align: center;
			cursor: pointer;
			white-space: nowrap;
		}
		.dwn:hover
		{
			box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
		}
	</style>
</head>
<body>
<div class="container">
<?php echo form_open_multipart("Files/image"); ?>
	<table class="table">
		<tr>
			<td>image</td>
			<td><input type="file" name="file_name"></td>
		</tr>
		<tr>
			<td><input type="submit" value="Send"></td>
		</tr>
	</table>


<?php echo form_close();  ?>




	<?php if(!empty($files)){ foreach($files as $frow){ ?>
<div class="file-box">
    <div class="box-content">
        <h5><?php echo $frow['title']; ?></h5>
        <div class="preview">
            <embed src="<?php echo base_url().'uploads/files/'.$frow['file_name']; ?>" width="80" height="80">
        </div>
        <a href="<?php echo base_url().'files/download/'.$frow['id']; ?>" class="dwn">Download</a>
    </div>
</div>
<?php } } ?>
</div>

</body>
</html>