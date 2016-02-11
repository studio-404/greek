<?php if(!defined("DIR")){ exit(); }
class page404 extends connection{
	function __construct($c){
		$this->template($c,"page404");
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

		$include = WEB_DIR."/page404.php";
		if(file_exists($include)){
			@include($include);
		}else{
			$controller = new error_page(); 
		}
	}
}
?>