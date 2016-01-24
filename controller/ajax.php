<?php if(!defined("DIR")){ exit(); }
class ajax extends connection{
	public $subject,$name,$email,$message,$lang,$ip;

	function __construct($c){
		if(!isset($_SESSION["requestWiev"])){
			$_SESSION["requestWiev"] = 1;
		}else{
			$_SESSION["requestWiev"]++;
		}
		if(isset($_SESSION["requestWiev"]) && $_SESSION["requestWiev"]>100000){
			//after 10 000 request shut it down
			die('E');
		}
		$this->requests($c);
	}

	public function requests($c){
		$conn = $this->conn($c); 

		if(Input::method("POST","registerme")=="true"){
			$e = Input::method("POST","e"); 
			$p = Input::method("POST","p"); 
			$n = Input::method("POST","n"); 

			if(!$e || !$p || !$n){
				echo "Error"; 
			}else{
				$ip = get_ip::ip();
				$sql = 'SELECT `id` FROM `studio404_users` WHERE `username`=:email AND `status`!=:status';
				$prepare = $conn->prepare($sql);
				$prepare->execute(array(
					":email"=>$e, 
					":status"=>1
				));
				if($prepare->rowCount() > 0){
					echo "Error";
				}else{
					$sql2 = 'INSERT INTO `studio404_users` SET `registered_date`=:registered_date, `registered_ip`=:registered_ip, `namelname`=:namelname, `username`=:email, `password`=:password, `user_type`=:user_type, `allow`=:allow';
					$prepare2 = $conn->prepare($sql2);
					$prepare2->execute(array(
						":registered_date"=>time(), 
						":registered_ip"=>$ip, 
						":email"=>$e, 
						":namelname"=>$n, 
						":password"=>md5($p), 
						":user_type"=>'website', 
						":allow"=>2
					));
					echo "Done";
					exit();
				}
			}			
		}

		if(Input::method("POST","loadmore")=="true"){
			$type = Input::method("POST","t");
			$from = Input::method("POST","f");
			$to = Input::method("POST","t2");
			$dlang = Input::method("POST","l");
			
			if($type=="epigraphy"){
				$sql = 'SELECT * FROM `studio404_components_inside` WHERE `cid`=:cid AND `lang`=:lang AND `status`!=1 ORDER BY `position` ASC LIMIT '.$from.','.$to;
				$prepare = $conn->prepare($sql); 
				$prepare->execute(array(
					":cid"=>8, 
					":lang"=>$dlang
				));
				if($prepare->rowCount() > 0){
					$fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);
					echo json_encode($fetch);
				}else{
					echo "Empty"; 
				}
			}else if($type=="usefulllinks"){
				$sql = 'SELECT * FROM `studio404_components_inside` WHERE `cid`=:cid AND `lang`=:lang AND `status`!=1 ORDER BY `position` ASC LIMIT '.$from.','.$to;
				$prepare = $conn->prepare($sql); 
				$prepare->execute(array(
					":cid"=>9, 
					":lang"=>$dlang
				));
				if($prepare->rowCount() > 0){
					$fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);
					echo json_encode($fetch);
				}else{
					echo "Empty"; 
				}
			}else{
				echo "Notin";
			}
			exit();
		}

		if(Input::method("POST","logintry")=="true"){
			if(!Input::method("POST","e") || !Input::method("POST","p")){
				echo "Error";
			}else{

				$sql = 'SELECT `id`,`username`,`namelname`,`picture`,`email`,`gender`, `mobile` FROM `studio404_users` WHERE `username`=:username AND `password`=:password AND `status`!=1';
				$prepare = $conn->prepare($sql); 
				$md5 = md5(Input::method("POST","p"));
				$prepare->execute(array(
					":username"=>Input::method("POST","e"), 
					":password"=>$md5
				));
				// echo "WPP 2";
				if($prepare->rowCount() > 0){
					$fetch = $prepare->fetch(PDO::FETCH_ASSOC); 
					$sql_update = 'UPDATE `studio404_users` SET `logtime`="'.time().'" WHERE `id`='.$fetch["id"];
					$query = $conn->query($sql_update);
					$_SESSION["greek_id"] = $fetch["id"];
					$_SESSION["greek_user"] = $fetch["username"];
					$_SESSION["greek_picture"] = $fetch["picture"];
					$_SESSION["greek_namelname"] = $fetch["namelname"];
					$_SESSION["greek_email"] = $fetch["email"];
					$_SESSION["greek_gender"] = $fetch["gender"];
					$_SESSION["greek_mobile"] = $fetch["mobile"];
					echo "Done";
				}else{
					echo "Error";
				}
			}
			exit();
		}

		if(Input::method("POST","updateprofile")=="true" && Input::method("POST","n")){
			$namelname = Input::method("POST","n");
			$email = Input::method("POST","e");
			$gender = Input::method("POST","g");
			$contactnumber = Input::method("POST","c");
			$sql = 'UPDATE `studio404_users` SET `namelname`=:namelname, `email`=:email, `gender`=:gender, `mobile`=:mobile WHERE `id`=:id';
			$prepare = $conn->prepare($sql);
			$prepare->execute(array(
				":namelname"=>$namelname, 
				":email"=>$email, 
				":gender"=>$gender, 
				":mobile"=>$contactnumber, 
				":id"=>$_SESSION["greek_id"]  
			));

			$_SESSION["greek_namelname"] = $namelname;
			$_SESSION["greek_email"] = $email;
			$_SESSION["greek_gender"] = $gender;
			$_SESSION["greek_mobile"] = $contactnumber;

			echo "Done";
			exit();
		}

		if(Input::method("POST","signout")=="true"){
			unset($_SESSION["greek_id"]);
			unset($_SESSION["greek_user"]);
			echo "Done";
			exit();
		}

		if(Input::method("POST","updatepass")=="true" && Input::method("POST","o") && Input::method("POST","n")==Input::method("POST","r")){
			$md5 = md5(Input::method("POST","o"));
			$nmd5 = md5(Input::method("POST","n"));
			$sql = 'SELECT `id` FROM `studio404_users` WHERE `password`=:password AND `id`=:id';
			$prepare = $conn->prepare($sql); 
			$prepare->execute(array(
				":password"=>$md5, 
				":id"=>$_SESSION["greek_id"]
			));
			if($prepare->rowCount() > 0){
				$sql2 = 'UPDATE `studio404_users` SET `password`=:password WHERE `id`=:id';
				$prepare2 = $conn->prepare($sql2); 
				$prepare2->execute(array(
					":password"=>$nmd5, 
					":id"=>$_SESSION["greek_id"] 
				));
				echo "Done"; 
			}else{
				echo "owrong";
			}
		}

	}


	public function selectEmailGeneralInfo(){
		global $c;
		$conn = $this->conn($c); 
		$out = array();
		$sql = 'SELECT `host`,`user`,`pass`,`from`,`fromname` FROM `studio404_newsletter` WHERE `id`=:id';
		$prepare = $conn->prepare($sql); 
		$prepare->execute(array(
			":id"=>1
		));
		$fetch = $prepare->fetch(PDO::FETCH_ASSOC); 
		$out["host"] = $fetch["host"];
		$out["user"] = $fetch["user"];
		$out["pass"] = $fetch["pass"];
		$out["from"] = $fetch["from"];
		return $out;
	}

	public function send($s,$n,$e,$m){
		$_SESSION["send_view"] = (isset($_SESSION["send_view"])) ? $_SESSION["send_view"]+1 : 1;
		if($_SESSION["send_view"]>150){ 
			echo "Error page."; 
			exit(); 
		}
		
		if(!$this->isValidEmail($e)){
			echo "Error page.";
			exit(); 
		}else{
			$i = $this->selectEmailGeneralInfo(); 
			$message = wordwrap(strip_tags($m), 70, "\r\n");
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$headers .= 'To: '.$n.' <'.$e.'>' . "\r\n";
			$headers .= 'From: '.$i["fromname"].' <'.$i["from"].'>' . "\r\n";
			$send_email = mail($e, $s, $m, $headers);

			if($send_email){
				echo "done !";
			}else{
				echo "Error page."; 
				exit(); 
			}
		}
	}

	public function isValidEmail($email){ 
    	return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

}
?>