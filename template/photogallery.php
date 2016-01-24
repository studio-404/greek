<?php 
@include("parts/header.php"); 
?>
<!-- START POPUP -->
<div id="message" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
		<div class="modal-body" id="modal_containerx">
			<!-- <h3 class="modal-title"></h3> -->
			<p class="modal-text"></p>
		</div> 
    </div>
  </div>
</div>
<!-- END POPUP -->
<div class="container">
	<div class="content_div">
		<div class="gallery_div">
			<div class="col-sm-9 padding_0">

				<div class="row">

					<?php
					foreach ($data["fotogallery"] as $value) {
					?>
					<div class="col-xs-6 col-md-4">
						<a href="javascript:void(0)" class="thumbnail" data-image="<?=WEBSITE.$value->file?>">
							<img src="<?=WEBSITE?>image?f=<?=WEBSITE.$value->file?>&amp;w=220&amp;h=174" width="100%" alt="" />
							<div class="caption">
	        					<p><?=strip_tags($value->title)?></p>
	        				</div>
						</a>						
					</div>
					<?php } ?>
					
				</div>

			</div>
			<div class="col-sm-3 padding_0">
				<div class="sidebar">
					<div class="title"><?=$data["text_general"][0]["title"]?></div>
					<div class="gallery_menu">
						<?php
						$x = 0;
						foreach ($data["photo_gallery_list"] as $value) {
							if(!Input::method("GET","slug") && $x==0){ $active = ' class="active"'; }
							else if(Input::method("GET","slug")==$value->smi_slug){ $active = ' class="active"'; }
							else{ $active = ''; }
							echo '<li'.$active.'><a href="?slug='.$value->smi_slug.'">'.$value->sg_title.'</a></li>';
							$x++;
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" charset="utf-8">
// $(document).ready(function(){
// 	$('.fancybox').fancybox({
// 		width: 150,
//     	height: 150, 
//     	autoSize : false 
// 	});
// });
</script>
<?php @include("parts/footer.php"); ?>