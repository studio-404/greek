<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php 
if($data["homepage_general"]){
	$title = $data["homepage_general"][0]->title; 
	$desc = $title." - Greekepigraphy.ge"; 
	$shareImage = TEMPLATE.'img/logoshare.png';
	$tags = $data["homepage_general"][0]->keywords;
}
echo $title; 
?> - Greekepigraphy.ge</title>
<!-- FB Meta tags (start) -->
<meta property="og:title" content="<?=htmlentities(strip_tags($title))?> - Enterprise Georgia" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?=WEBSITE_.$_SERVER['REQUEST_URI']?>"/>
<meta property="og:image" content="<?=$shareImage?>" />
<meta property="og:site_name" content="Enterprise Georgia"/>
<meta property="og:description" content="<?=htmlentities(strip_tags($desc))?>"/>
<!-- FB Meta tags (end)-->
<meta name="description" content="<?=htmlentities(strip_tags($desc))?>">
<meta name="keywords" content="<?=$tags?>">
<meta name="author" content="Studio 404, Niki Getsadze"/>
<link type="text/plain" rel="author" href="<?php echo WEBSITE;?>humans.txt?v=<?=$c['websitevertion']?>" />
<link rel="shortcut icon" href="<?php echo TEMPLATE;?>img/favicon.ico?v=<?=$c['websitevertion']?>" type="image/x-icon" /> 
<link rel="stylesheet" href="<?php echo TEMPLATE;?>css/bootstrap.css?v=<?=$c['websitevertion']?>"> 
<link rel="stylesheet" href="<?php echo TEMPLATE;?>css/style.css?v=<?=$c['websitevertion']?>"> 
<link rel="stylesheet" href="<?php echo TEMPLATE;?>css/custom_res.css?v=<?=$c['websitevertion']?>"> 
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js?v=<?=$c['websitevertion']?>"></script>
<script type="text/javascript" src="<?php echo TEMPLATE;?>js/bootstrap.js?v=<?=$c['websitevertion']?>"></script>
<style type="text/css">
<?php
if(LANG=="en"){
	echo '*{ font-family: roboto !important; }';
}
?>
</style>
</head>
<body> 
<div class="header_div" <?=(LANG=="en") ? 'style="font-family: roboto"' : ''?>>
	<div class="container">
		<div class="logo">
			<a href="<?=WEBSITE.LANG?>/welcome">
				<img src="<?php echo TEMPLATE;?>img/logo.png" alt="logo" value="" />
			</a>
		</div>
		<div class="domain_name">www.greekepigraphy.ge</div>
		<div class="search_div">
			<input type="text" placeholder="<?=$data["language_data"]["val91"]?>"/>
			<input type="submit" value="<?=$data["language_data"]["val3"]?>"/>
		</div>
		<div class="reg_login">
			<?php if(!isset($_SESSION["greek_id"])): ?>
			<a href="<?=WEBSITE.LANG?>/userspage" class="underlineme"><?=$data["language_data"]["val92"]?></a>
			<?php endif; ?>

			<?php if(isset($_SESSION["greek_id"])): ?>
			<a href="<?=WEBSITE.LANG?>/userspage" class="underlineme"><?=$data["language_data"]["val101"]?></a> <a>&nbsp;&nbsp;|&nbsp;&nbsp;</a>
			<a href="javascript:void(0)" class="signout underlineme"><?=$data["language_data"]["val102"]?></a> 
			<?php endif; ?>
		</div>
		<div class="lang_div">
			<?php
				$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
				$find = '/'.LANG.'/'; 
				$repl = (LANG=="ge") ? '/en/' : '/ge/';
				$replace = str_replace($find, $repl, $actual_link);
			?>
			<a href="<?=$replace?>" id="currlanguage" data-currentlang="<?=LANG?>"><?=(LANG=="ge") ? "ENGLISH" : "GEORGIAN"?></a>
		</div>
	</div>
</div>

<div class="top_menu">
<div class="container-fluid padding_0">
	<div class="container">
 <!-- Static navbar -->
      <nav class="navbar">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div id="navbar" class="navbar-collapse collapse padding_0" <?=(LANG=="en") ? 'style="font-family: roboto"' : ''?>>
              <?=$data["main_menu"]?>
          </div><!--/.nav-collapse -->
      </nav>
	</div> 
</div>
</div>