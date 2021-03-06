<?php 
	@include("parts/header.php"); 
?>
<!-- START POPUP -->
<div id="message" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:340px;">
    <!-- Modal content-->
    <div class="modal-content">
		<div class="modal-body" id="modal_containerx">
			<h3 class="modal-title"></h3>
			<p class="modal-text"></p>
		</div> 
    </div>
  </div>
</div>
<!-- END POPUP -->

<div class="container">

	<div class="content_div">
		 <div class="content_title_2"><?=$data["homepage_general"][0]->title?></div>
		 <div class="lists_div file_bg download_icon">
		 	<ul style="margin:0; padding:0; list-style-type:none" class="epigraphy-list">
		 	<?php
		 	$x = 1;
		 	$limit = 5;
		 	foreach ($data["components"] as $value) {
		 		if($value->com_name != "inscriptions"){ continue; }
		 		if($x>$limit){ break; }
		 		if(!isset($_SESSION["greek_id"])){
		 			echo '<li><a href="javascript:void(0)" class="notsigned">'.$value->title.'</a></li>';
		 		}else{
		 			echo '<li><a href="'.WEBSITE.LANG.'/document?id='.(int)$value->idx.'" target="_docs">'.$value->title.'</a></li>';
		 		}
		 		$x++;
		 	}
		 	?>
			</ul>
			
		</div>
		<?php 
		//echo $x;
		if($x == ($limit+1)) : ?>
		<div class="show_more_list">
			<a href="javascript:void(0)" class="loadmore" data-type="epigraphy" data-dlang="<?=LANG_ID?>" data-from="<?=$limit?>" data-to="10"><?=$data["language_data"]["val120"]?></a>
		</div>
		<?php endif; ?>
	</div>
	
</div>
<?php @include("parts/footer.php"); ?>