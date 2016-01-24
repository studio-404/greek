<?php if(!defined("DIR")){ exit(); }
class inscriptions extends connection{
	function __construct($c){
		$this->template($c,"epigraphy");
	}
	
	public function template($c,$page){
		$conn = $this->conn($c); // connection

		$cache = new cache();
		$homepage_general = $cache->index($c,"homepage_general");
		$data["homepage_general"] = json_decode($homepage_general); 


		$text_files = $cache->index($c,"text_files");
		$data["text_files"] = json_decode($text_files);

		$text_documents = $cache->index($c,"text_documents");
		$data["text_documents"] = json_decode($text_documents);

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
		$model_template_main_menu = new model_template_main_menu();
		$data["main_menu"] = $model_template_main_menu->nav($menu_array,"header");
		$data["footer_menu"] = $model_template_main_menu->nav($menu_array,"footer");


		/* components */
		$components = $cache->index($c,"components");
		$data["components"] = json_decode($components); 
		$include = WEB_DIR."/epigraphy.php";
		if(file_exists($include)){
			@include($include);
		}else{
			$controller = new error_page(); 
		}
	}
}
?>