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
		 	<?php
		 	foreach ($data["text_documents"] as $value) {
		 		if(!isset($_SESSION["greek_id"])){
		 			echo '<li><a href="javascript:void(0)" class="notsigned">'.$value->title.'</a></li>';
		 		}else{
		 			echo '<li><a href="'.WEBSITE.LANG.'/document?id='.(int)$value->idx.'" target="_docs">'.$value->title.'</a></li>';
		 		}
		 	}
		 	?>
			
			
		</div>
		<div class="show_more_list">
			<a href="#">ჩამოტვირთე მეტი</a>
		</div>
	</div>
	
</div>
<?php @include("parts/footer.php"); ?>