<?php if(!defined("DIR")){ exit(); }
class document extends connection{
	function __construct($c){
		$this->template($c,"document");
	}
	
	public function template($c,$page){
		$conn = $this->conn($c); 
		$idx = Input::method("GET","id");
		if(!isset($_SESSION["greek_id"])){
			if(LANG=="ge"){
				echo "<strong>გთხოვთ გაიაროთ ავტორიზაცია !</strong>";
				exit();
			}else{
				echo "<strong>Please sing in !</strong>";
				exit();
			}
		}
		$sql = 'SELECT `document` FROM `studio404_components_inside` WHERE `idx`=:idx AND `lang`=:lang';
		$prepare = $conn->prepare($sql); 
		$prepare->execute(array(
			":idx"=>$idx, 
			":lang"=>LANG_ID 
		));
		if($prepare->rowCount() > 0){
			$fetch = $prepare->fetch(PDO::FETCH_ASSOC); 
			
			$file = $fetch["document"]; 
			if(file_exists($file)){
				$content = file_get_contents($file);
				$name = time().".pdf";
				header('Content-Type: application/pdf');
				header('Content-Length: '.strlen( $content ));
				header('Content-disposition: inline; filename="' . $name . '"');
				header('Cache-Control: public, must-revalidate, max-age=0');
				header('Pragma: public');
				header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
				header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
				// output content
				echo $content;
			}else{
				if(LANG=="ge"){
					echo "<strong>მოთხოვნილი დოკუმენტი ვერ მოიძებნა !</strong>";
					exit();
				}else{
					echo "<strong>Sorry, Could not load requested document !</strong>";
					exit();
				}
			}
			
		}else{
			if(LANG=="ge"){
				echo "<strong>მოთხოვნილი დოკუმენტი ვერ მოიძებნა !</strong>";
				exit();
			}else{
				echo "<strong>Sorry, Could not load requested document !</strong>";
				exit();
			}
		}
	}
}
?>