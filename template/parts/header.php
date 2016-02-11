<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="<?=LANG?>">
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php 
if($data["homepage_general"]){
$title = $data["homepage_general"][0]->title; 
if($data["homepage_general"][0]->description){
$desc = $data["homepage_general"][0]->description;
}else{
$desc = $title." - Greekepigraphy.ge"; 	
}
$shareImage = TEMPLATE.'img/logoshare.png';
$tags = $data["homepage_general"][0]->keywords;
}
echo $title; 
?> - Greekepigraphy.ge</title>
<!-- FB Meta tags (start) -->
<meta property="fb:app_id" content="170822606610669" />
<meta property="og:title" content="<?=htmlentities(strip_tags($title))?> - Greekepigraphy" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?=WEBSITE_.$_SERVER['REQUEST_URI']?>"/>
<meta property="og:image" content="<?=$shareImage?>" />
<meta property="og:image:width" content="600" />
<meta property="og:image:height" content="315" />
<meta property="og:site_name" content="Greekepigraphy"/>
<meta property="og:description" content="<?=htmlentities(strip_tags($desc))?>"/>
<!-- FB Meta tags (end)-->
<meta name="description" content="<?=htmlentities(strip_tags($desc))?>">
<meta name="keywords" content="<?=$tags?>">
<meta name="author" content="Studio 404" />
<link type="text/plain" rel="author" href="<?php echo WEBSITE;?>humans.txt?v=<?=$c['websitevertion']?>" />
<link rel="shortcut icon" href="<?php echo TEMPLATE;?>img/favicon.ico?v=<?=$c['websitevertion']?>" type="image/x-icon" /> 
<link rel="stylesheet" href="<?php echo TEMPLATE;?>css/bootstrap.css?v=<?=$c['websitevertion']?>"> 
<link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo TEMPLATE;?>css/style.css?v=<?=$c['websitevertion']?>"> 
<link rel="stylesheet" href="<?php echo TEMPLATE;?>css/custom_res.css?v=<?=$c['websitevertion']?>"> 
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js?v=<?=$c['websitevertion']?>"></script>
<script type="text/javascript" src="<?php echo TEMPLATE;?>js/bootstrap.js?v=<?=$c['websitevertion']?>"></script>
<style type="text/css">
<?php
if(LANG=="en"){
echo '*{ font-family: roboto !important; } .content_title_2{ font-size:21px; }';
}
?>
</style>
</head>
<body>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-72117132-1', 'auto');
ga('send', 'pageview');
</script> 
<div class="header_div" <?=(LANG=="en") ? 'style="font-family: roboto"' : ''?>>
<div class="container">
<div class="logo">
<a href="<?=WEBSITE_?>">
<img src="<?php echo TEMPLATE;?>img/logo.png" alt="logo" value="" />
</a>
</div>
<div class="domain_name" style="font-family: roboto_bold !important">www.greekepigraphy.ge</div>
<div class="search_div">
<input type="text" id="keyword" onkeypress="submitme(event,'search-button')" value="<?=(Input::method("GET","search")) ? htmlentities(Input::method("GET","search")) : ''?>" placeholder="<?=$data["language_data"]["val91"]?>"/>
<input type="submit" id="search-button" value="<?=$data["language_data"]["val3"]?>"/>
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
$replace = str_replace($find, $repl, $actual_link, $count);
if($count==0){
$replace = WEBSITE."en/".$c["welcome.page.slug"];
}
?>
<a href="<?=$replace?>" id="currlanguage" data-currentlang="<?=LANG?>"><?=(LANG=="ge") ? "ENGLISH" : "GEORGIAN"?></a>
</div>
</div>
</div>
<div class="top_menu">
<div class="container-fluid padding_0">
<div class="container">
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
</div>
</nav>
</div> 
</div>
</div>