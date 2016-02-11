<?php 
@include("parts/header.php");
?>
<div class="container">
	
	<div class="content_div">
		 <div class="content_title_2"><?=$data["homepage_general"][0]->title?></div>
		 <div class="contant_text">
		 	<?=$data["homepage_general"][0]->text?>
		 </div>
	</div>
	
</div>
 

<?php
@include("parts/footer.php"); 
?>