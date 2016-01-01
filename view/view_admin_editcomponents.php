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
	<script src="<?=SCRIPTS?>drop_files.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="<?=PLUGINS?>jquery-ui-1.11.4.custom/jquery-ui.css">
	<script src="<?=PLUGINS?>jquery-ui-1.11.4.custom/jquery-ui.js"></script>
	<!--Fancybox popup START-->
	<script type="text/javascript" src="<?=PLUGINS?>jquery.fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
	<script type="text/javascript" src="<?=PLUGINS?>jquery.fancybox/source/jquery.fancybox.pack.js"></script>
	<script type="text/javascript" src="<?=PLUGINS?>jquery.fancybox/source/jquery.fancybox.js"></script>
	<link rel="stylesheet" type="text/css" href="<?=PLUGINS?>jquery.fancybox/source/jquery.fancybox.css" media="screen" />
	<!--Fancybox popup END-->
	<?php @include("view/parts/tinyMce.php"); ?>
	<script type="text/javascript">
	$(function() {
		$( "#tabs" ).tabs();
		$(".justlink").attr({"aria-controls":""});
	});
	</script>
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
					  <p>Data updated !</p>
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
					<div class="from-header" style="color:#ef4836; text-transform:uppercase">Edit catalog item</div>
					<div id="tabs">
						<?php echo $data["interface"][0]; ?>
						<?php echo $data['interface'][1]; ?>
					</div>
					<input type="submit" name="edit_components" id="submit" value="Submit"><br>
					<button id="cancel" onclick="redirect('_self','<?=WEBSITE.LANG."/".ADMIN_SLUG?>?action=catalogModule&type=catalogpage&id=<?=$_GET['id']?>&super=<?=$_GET['super']?>&token=<?=$_SESSION['token']?>'); return false;">Back</button>
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