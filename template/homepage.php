<?php 
@include("parts/header.php");
?>
<div id="message" class="modal fade" role="dialog">
<div class="modal-dialog" style="width:340px;">
<div class="modal-content">
<div class="modal-body" id="modal_containerx">
<h3 class="modal-title"></h3>
<p class="modal-text"></p>
</div> 
</div>
</div>
</div>
<div class="container">
<div class="home_slider">
<div id="home_slider" class="carousel slide" data-ride="carousel">
<div class="carousel-inner" role="listbox">
<?php
$x = 0;
foreach ($data["components"] as $value) {
if($value->com_name != "Main page slider"){ continue; }
$item = ($x==0) ? ' active' : '';
?>
<div class="item<?=$item?>">
<img src="<?=WEBSITE?>image?f=<?=WEBSITE_.$value->image?>&amp;w=1000&amp;h=320" alt="<?=htmlentities($value->title)?>" />
<div class="slide_info">
<div class="title"><?=htmlentities($value->title)?></div>
<div class="text"><?=htmlentities($value->desc)?></div>
</div>
</div>
<?php
$x++;
}
?>
</div>
<a class="left carousel-control" href="#home_slider" role="button" data-slide="prev">
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#home_slider" role="button" data-slide="next">
<span class="sr-only">Next</span>
</a>
</div>
</div>
<div class="content_div">
<div class="col-sm-6 padding_0">
<div class="content_title"><?=$data["language_data"]["val117"]?> ( <a href="<?=WEBSITE.LANG?>/inscriptions" style="color:#f58220"><?=$data["language_data"]["val119"]?></a> )</div>
<div class="lists_div file_bg">
<ul style="margin:0; padding:0; list-style-type:none" class="epigraphy-list">
<?php
$x = 1;
$limit = 3;
$ctext = new ctext();
foreach ($data["components"] as $value) {
if($value->com_name != "inscriptions"){ continue; }
if($x>$limit){ break; }
if(!isset($_SESSION["greek_id"])){
echo '<li><a href="javascript:void(0)" class="notsigned">'.$ctext->cut($value->title,45).'</a></li>';
}else{
echo '<li><a href="'.WEBSITE.LANG.'/document?id='.(int)$value->idx.'" target="_docs">'.$ctext->cut($value->title,45).'</a></li>';
}
$x++;
}
?>
</ul>
</div>
<div class="content_title"><?=$data["language_data"]["val118"]?> ( <a href="<?=WEBSITE.LANG?>/usefull-links" style="color:#f58220"><?=$data["language_data"]["val119"]?></a> )</div>
<div class="lists_div link_bg">
<ul style="margin:0; padding:0; list-style-type:none" class="epigraphy-list">
<?php
$x = 1;
$limit = 4;
$ctext = new ctext();
foreach ($data["components"] as $value) {
if($value->com_name != "Usefull links"){ continue; }
if($x>$limit){ break; }
echo '<li title="'.htmlentities($value->title).'"><a href="'.$value->url.'" target="_links">'.$ctext->cut($value->title,40).'</a></li>';
$x++;
}
?>
</ul>
</div>
</div>
<div class="col-sm-6 padding_0">
<div class="home_text_div">
<?php
echo $data["homepage_general"][0]->text;
?>
</div>
</div>
</div>
</div>
<?php
@include("parts/footer.php"); 
?>