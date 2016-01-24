<?php 
header("Content-type: text/xml"); 
define("DIR",__FILE__);
@include('config.php');
@include('functions/connection.php');
$connection = new connection();
$conn = $connection->conn($c);
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
<?php
try{
	$sql = 'SELECT `title`,`slug`,`lang` FROM `studio404_pages` WHERE `cid`=:cid AND `status`!=1 ORDER BY `id` DESC';
	$prepare = $conn->prepare($sql); 
	$prepare->execute(array(
		":cid"=>1
	));
	if($prepare->rowCount() > 0){
		$fetch = $prepare->fetchAll(PDO::FETCH_ASSOC); 
		
		foreach($fetch as $val){
			if($val['lang']==1){ $l = "ge"; }
			else{ $l = "en"; }
			echo '<url>';
			echo '<loc>http://greekepigraphy.ge/'.$l.'/'.$val['slug'].'</loc>';
			echo '<changefreq>always</changefreq>';
			echo '</url>';
		}
	}
?>

<?php
}catch(Exception $e){

}
?>
</urlset>