<?php if(!defined("DIR")){ exit(); }
class select_form extends connection{
	public function form($c, $cid, $lang){
		$conn = $this->conn($c); 
		$jsonfilename = "_cache/formarray".$cid.$lang .".json";

		if(file_exists($jsonfilename)){
			$filegetcontent = @file_get_contents($jsonfilename); 
			$output = json_decode($filegetcontent,true); 
		}else{
			$data = array();
			$sql = 'SELECT * FROM `studio404_forms` WHERE `cid`=:cid AND `lang`=:lang ORDER BY `id` ASC';
			$prepare = $conn->prepare($sql);
			$prepare->execute(array(
				":cid"=>$cid, 
				":lang"=>$lang 
			));
			if($prepare->rowCount() > 0){
				$fetch = $prepare->fetchAll(PDO::FETCH_ASSOC); 
				$data = array();
				$x = 0;
				foreach($fetch as $val){
					$data["id"][$x] = $val["id"]; 
					$data["cid"][$x] = $val["cid"]; 
					$data["label"][$x] = $val["label"]; 
					$data["type"][$x] = $val["type"]; 
					$data["name"][$x] = $val["name"]; 
					$data["placeholder"][$x] = $val["placeholder"]; 
					$data["attach_column"][$x] = $val["attach_column"]; 
					$data["attach_multiple"][$x] = $val["attach_multiple"]; 
					$data["attach_fileformat"][$x] = $val["attach_format"]; 
					$data["important"][$x] = $val["important"]; 
					$data["list"][$x] = $val["list"]; 
					$data["filter"][$x] = $val["filter"]; 
					$data["lang"][$x] = $val["lang"]; 
					$data["sub"][$x] = array(); 
					$sql2 = 'SELECT * FROM `studio404_forms_lists` WHERE `cid`=:cid AND `cf_id`=:cf_id AND `lang`=:lang ORDER BY `id` ASC'; 
					$prepare2 = $conn->prepare($sql2);
					$prepare2->execute(array(
						":cid"=>$cid, 
						":cf_id"=>$val["id"], 
						":lang"=>$lang 
					));
					
					if($prepare2->rowCount() > 0){
						$data["sub"][$x] = $prepare2->fetchAll(PDO::FETCH_ASSOC); 
					}
					$x++;
				}
			}
			$fh = @fopen($jsonfilename, 'w') or die("Error opening output file");
			@fwrite($fh, json_encode($data,JSON_UNESCAPED_UNICODE));
			@fclose($fh);
			$output = $data;
		}
		return $output;
	}

	public function select_options($c,$parentidx, $cid = "", $lang = ""){
		$conn = $this->conn($c); 
		if($cid==""){ $cid = Input::method("GET","parent"); }
		if($lang==""){ $lang = LANG_ID; }
		
		$sql2 = 'SELECT * FROM `studio404_forms_lists` WHERE `cid`=:cid AND `cf_id`=:cf_id AND `lang`=:lang ORDER BY `id` ASC'; 
		$prepare2 = $conn->prepare($sql2);
		$prepare2->execute(array(
			":cid"=>$cid, 
			":cf_id"=>$parentidx, 
			":lang"=>$lang
		));

		if($prepare2->rowCount() > 0){
			$fetch = $prepare2->fetchAll(PDO::FETCH_ASSOC);
		}else{
			$fetch = array();
		}
		return $fetch; 
	}
}
?>