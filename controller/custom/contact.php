<?php if(!defined("DIR")){ exit(); }
			class contact{
				function __construct($c){
					$this->template($c,"contact");
				}
				
				public function template($c,$page){
					$include = WEB_DIR."/contact.php";
					if(file_exists($include)){
					/* 
					** Here goes any code developer wants to 
					*/
					@include($include);
					}else{
						$controller = new error_page(); 
					}
				}
			}
			?>