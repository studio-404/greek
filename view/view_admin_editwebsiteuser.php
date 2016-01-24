<?php
//session_destroy();
?>
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

				<form action="" method="post" class="my-form hundredPorsent" autocomplete="off">
					<div class="from-header" style="color:#ef4836; text-transform:uppercase">Edit website user</div>
					
					
					<label for="username">Username: <font color="RED">*</font></label>
					<input type="text" name="username" id="username" value="<?=htmlentities($data["profile"]["username"])?>" autocomplete="off" disabled="disabled">

					<label for="namelname">Firstname Lastname: <font color="RED">*</font></label>
					<input type="text" name="namelname" id="namelname" value="<?=htmlentities($data["profile"]["namelname"])?>" autocomplete="off" disabled="disabled">

					<label for="gender">Gender: <font color="RED">*</font></label>
					<input type="text" name="gender" id="gender" value="<?=htmlentities($data["profile"]["gender"])?>" autocomplete="off" disabled="disabled">

					<label for="email">Email:</label>
					<input type="text" name="email" id="email" value="<?=htmlentities($data["profile"]["email"])?>" autocomplete="off" disabled="disabled">

					<label for="mobile">Contact Number:</label>
					<input type="text" name="mobile" id="mobile" value="<?=htmlentities($data["profile"]["mobile"])?>" autocomplete="off" disabled="disabled">
					
					<input type="submit" name="edit_website_user" id="submit" value="Submit"><br>
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