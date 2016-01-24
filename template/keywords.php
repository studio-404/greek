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
		<div style="margin:0 0 20px 0">საკვანძო სიტყვა: <strong style="color:#f58220"><?=Input::method("GET","search")?></strong></div>
		
		<div class="lists_div">
			<ul style="margin:0; padding:0; list-style-type:none" class="epigraphy-list">
				<?php
				foreach ($data["fetch"] as $value) {
					if($value["cid"]==8){
						if(!isset($_SESSION["greek_id"])){
							echo '<li><a href="javascript:void(0)" class="notsigned fflink">'.$value["title"].'</a></li>';
						}else{
							echo '<li><a href="'.WEBSITE.LANG.'/document?id='.$value["idx"].'" target="_docs" class="fflink">'.$value["title"].'</a></li>';
						}
					}else{
						echo '<li><a href="'.$value["url"].'" target="_links" class="lllink">'.$value["title"].'</a></li>';
					}
				}
				?>
			</ul>
		</div>
	
		
	</div>
	
</div>
<?php @include("parts/footer.php"); ?>