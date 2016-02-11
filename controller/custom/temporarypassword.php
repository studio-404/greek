<?php if(!defined("DIR")){ exit(); }
class temporarypassword extends connection{
	function __construct($c){
		if(!Input::method("GET","token")){
			redirect::url(WEBSITE.LANG."/".$c["welcome.page.slug"]);
		}
		$this->template($c,"temporarypassword");
	}
	
	public function template($c,$page){
		$conn = $this->conn($c); // connection
		$cache = new cache();
		$homepage_general = $cache->index($c,"homepage_general");
		$data["homepage_general"] = json_decode($homepage_general); 
	
		$data["homepage_files"] = $cache->index($c,"homepage_files");

		/* languages */
		$languages = $cache->index($c,"languages");
		$data["languages"] = json_decode($languages); 

		/* language variables */
		$language_data = $cache->index($c,"language_data");
		$language_data = json_decode($language_data);
		$model_template_makevars = new  model_template_makevars();
		$data["language_data"] = $model_template_makevars->vars($language_data); 
	
		/* website menu header & footer */
		$menu_array = $cache->index($c,"main_menu");
		$menu_array = json_decode($menu_array);
		if($menu_array){
			$model_template_main_menu = new model_template_main_menu();
			$data["main_menu"] = $model_template_main_menu->nav($menu_array,"header");
			$data["footer_menu"] = $model_template_main_menu->nav($menu_array,"footer");
		}

		/* components */
		$components = $cache->index($c,"components");
		$data["components"] = json_decode($components); 

		$select = 'SELECT * FROM `studio404_users_pass_recover` WHERE `hash`=:hash AND `status`!=1';
		$prepare = $conn->prepare($select);
		$prepare->execute(array(
			":hash"=>Input::method("GET","token")
		));
		if($prepare->rowCount() > 0){
			$fetchme = $prepare->fetch(PDO::FETCH_ASSOC);
			
			$data["recover_id"] = $fetchme["id"];
			$data["recover_username"] = $fetchme["usersemail"];
			$data["newpassword"] = $fetchme["temp"];
			$data["newpassword_md5"] = md5($fetchme["temp"]);
			//update password
			$update = 'UPDATE `studio404_users` SET `password`=:newpassword WHERE `username`=:username AND `status`!=1';
			$pre_update = $conn->prepare($update);
			$pre_update->execute(array(
				":newpassword"=>$data["newpassword_md5"], 
				":username"=>$data["recover_username"]
			));
			// update recover 
			$update2 = 'UPDATE `studio404_users_pass_recover` SET `status`=1 WHERE `id`=:id';
			$pre_update2 = $conn->prepare($update2);
			$pre_update2->execute(array(
				":id"=>$data["recover_id"]
			));

			if(LANG=="ge"){
				$data["users_message"] = '<strong>მომხმარებლის სახელი: </strong> '.$data["recover_username"].'<br />';
				$data["users_message"] .= '<strong>დროებითი პაროლი: </strong> '.$data["newpassword"].'<br />';
			}else{
				$data["users_message"] = '<strong>Username: </strong> '.$data["recover_username"].'<br />';
				$data["users_message"] .= '<strong>Temporary Password: </strong> '.$data["newpassword"].'<br />';
			}

		}else{
			redirect::url(WEBSITE.LANG."/page404");
		}

		$include = WEB_DIR."/temporarypassword.php";
		if(file_exists($include)){
			@include($include);
		}else{
			$controller = new error_page(); 
		}
	}
}
?>