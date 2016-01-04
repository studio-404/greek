<?php 
@include("parts/header.php");
?>
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
						<img src="<?=WEBSITE.$value->image?>" alt="<?=htmlentities($value->title)?>" />
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
			<div class="content_title">წარწერები</div>
			<div class="lists_div file_bg">
				<li><a href="#">სინის მთის ქართულ ხელნაწერთა აღწერილობა</a></li>
				<li><a href="#">ლიტერატურული ურთიერთობანი</a></li>
				<li><a href="#">კავკასიის მოსახლეობის ანთროპოლოგია ად...</a></li>
			</div>
			<div class="content_title">სასარგებლო ბმულები</div>
			<div class="lists_div link_bg">
				<li><a href="#">ევროპულ და ევრო-ატლანტიკურ სტრუქტურებში...</a></li>
				<li><a href="#">ევროპულ და ევრო-ატლანტიკურ სტრუქტურებში...</a></li>
				<li><a href="#">ევროპულ და ევრო-ატლანტიკურ სტრუქტურებში...</a></li>
				<li><a href="#">ევროპულ და ევრო-ატლანტიკურ სტრუქტურებში...</a></li>
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