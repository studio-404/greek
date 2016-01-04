<?php 
	@include("parts/header.php"); 
?>
<div class="container">

	<div class="content_div">
		 <div class="content_title_2"><?=$data["homepage_general"][0]->title?></div>
		 <div class="contact_div">

		 	<?php
		 	foreach ($data["components"] as $val) : 
		 		if($val->com_name != "Contact info"){ continue; }
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
				<div class="title">მოგვძებნე რუკაზე</div>
				<div class="map_iframe">
					<!-- <img src="img/map.png"> -->
				</div>
			</div>
		 </div>
	</div>
	
</div>
<?php @include("parts/footer.php"); ?>