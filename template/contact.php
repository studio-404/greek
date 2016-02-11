<?php 
	@include("parts/header.php"); 
?>
<div class="container">

	<div class="content_div">
		<div class="content_title_2"><?=$data["homepage_general"][0]->title?></div>
		<?php
	 	foreach ($data["components"] as $val) : 
	 	if($val->com_name != "Contact info"){ continue; }
	 	if($val->title != "Main text" && $val->title != "მთავარი ტექსტი"){ continue; }
	 	?>
		 <strong><?=strip_tags($val->desc,"<br>")?>.</strong><br /><br />
		<?php
		endforeach;
		?>
		 
		 <div class="contact_div">
			<?php
		 	foreach ($data["components"] as $val) : 
		 		if($val->com_name != "Contact info"){ continue; }
		 		if($val->title == "Main text" || $val->title == "მთავარი ტექსტი"){ continue; }
		 	?>
			<div class="col-sm-12 padding_0">
				 <div class="col-sm-3 padding_0">
					<div class="contact_label_title"><?=$val->title?></div>
				 </div>
				 <div class="col-sm-9 padding_0">
					<div class="contact_label_text"><?=$val->desc?></div>
				 </div>
			</div>	
			<?php
			endforeach;
			?>
			
			<div class="contact_map">
				<!-- <div class="title">მოგვძებნე რუკაზე</div> -->
				<div class="map_iframe">
					<iframe src="https://www.google.com/maps/d/u/2/embed?mid=zAfHtFft4XFk.kBcmeDnGfGeg&amp;z=18" width="100%" height="380" style="height:380px" frameborder="0"></iframe>
				</div>
			</div>
		 </div>
	</div>
	
</div>
<?php @include("parts/footer.php"); ?>