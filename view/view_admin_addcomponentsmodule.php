<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<title><?=$data["website_title"]?></title>
	<link href="<?=STYLES?>reset.css" type="text/css" rel="stylesheet" /> 
	<link href="<?=PLUGINS."font-awesome-4.3.0/css/font-awesome.css"?>" type="text/css" rel="stylesheet" />
	<link href="<?=STYLES?>en.css" type="text/css" rel="stylesheet" /> 
	<link href="<?=STYLES?>general.css" type="text/css" rel="stylesheet" /> 
	<script src="<?=SCRIPTS?>jquery-1.11.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?=SCRIPTS?>javascript.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?=SCRIPTS?>drop.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="<?=PLUGINS?>jquery-ui-1.11.4.custom/jquery-ui.css">
	<script src="<?=PLUGINS?>jquery-ui-1.11.4.custom/jquery-ui.js"></script>
	<!--Start timepicker-->
	<link href="<?=STYLES?>jquery-ui-timepicker-addon.css" type="text/css" rel="stylesheet" /> 
	<script src="<?=SCRIPTS?>jquery-ui-timepicker-addon.js" type="text/javascript" charset="utf-8"></script>
	<!--End timepicker-->
	<?php @include("view/parts/tinyMce.php"); ?>
</head>
<body>
	<?php
	@include("view/parts/header.php");
	?>
	<main>
		<div class="center">
			<?php
			@include("view/parts/breadcrups.php");
			?>
			<div class="content">

				<?php
				if(!empty($data["outMessage"]) && $data["outMessage"]==1){
				?>
					<div class="success message" onclick="hideMe('.message')">
					  <h2>Success</h2>
						<p>Data inserted !</p>
					</div>
				<?php
				}
				if(!empty($data["outMessage"]) && $data["outMessage"]==2){
				?>
					<div class="error message" onclick="hideMe('.message')">
					  <h2>Error</h2>
						<p>Something went wrong !</p>
					</div>
				<?php
				}
				?>

				<form action="" method="post" class="my-form hundredPorsent" autocomplete="off" enctype="multipart/form-data">
					<div class="from-header" style="color:#ef4836; text-transform:uppercase">Add component module</div>
					
					<label for="date">Date: <font color="RED">*</font></label>
					<input type="text" name="date" class="datepicker" value="<?=date('d-m-Y H:i')?>" />
					<script>
					$(function() {
						$( ".datepicker" ).datetimepicker({ dateFormat: 'dd-mm-yy', changeYear: true });
					});
					</script>
					<label for="title">Title: <font color="RED">*</font></label>
					<input type="text" name="title" id="title" value="" autocomplete="off">

					<label for="shortdesc">Short desc</label>
					<!-- <input type="text" name="shortdesc" id="shortdesc" value="" autocomplete="off" /> -->
					<textarea name="shortdesc" class="tinyMce"><?=htmlentities('')?></textarea>

					<label for="url">Url: </label>
                    <input type="text" name="url" id="url" value="" autocomplete="off" />

                    <div class="attachdocument" style="position:relative">
                    	<label for="document">Document: ( DOC, DOCX, PDF, XLS, XLSX, ZIP, RAR )</label><br />
                    	<div class="calluploaddocument" style="width:200px; line-height:35px; background-color:#399bff; color:white; padding:0 10px; cursor:pointer; text-align:center; font-family: roboto">Choose Document</div>
                    	<input type="file" name="docs" id="docs" value="" autocomplete="off" style="position:absolute; bottom:-20px; visibility:hidden" />
                    </div>

                    <label for="backgroundImage">Image:</label><br />
					<input type="hidden" name="background" id="background" value="" />
					<input type="file" name="bgfile" id="bgfile" value="" style="position:absolute; visibility:hidden">
					<div class="dragableArea">
						<h3>Drag and drop image (jpeg,jpg,gif,png)</h3>
						<div id="progress-bar"></div>
					</div><br />
					<div id="img">
						<p>No Image</p>
					</div>
					<div class="clearfix"></div>
					
					<input type="submit" name="add_componentmodel" id="submit" value="Submit"><br>
				</form>
			</div>
		</div>
	</main>
	<div class="clearfix"></div>
	<?php
	@include("view/parts/footer.php");
	?>
</body>
</html>