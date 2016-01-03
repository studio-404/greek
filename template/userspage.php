<?php 
	@include("parts/header.php"); 
?>
<div class="container">
	
	<div class="content_div">
		 <div class="content_title_2"><?=$data["homepage_general"][0]->title?></div>
	</div>
	<div class="structure_page_div">
		<?php if(!isset($_SESSION["greek_id"])) { ?>
	 
			<div class="col-sm-6 padding_0">
				<div class="register_div">
					<div class="title"><?=$data["language_data"]["val95"]?></div>
					<div class="form-group" id="resalt" style="display:none">
					</div>
					<div class="form-group">
						<label><?=$data["language_data"]["val96"]?>:</label>
						<input type="text" id="namelname" class="form_1" value="" />
					</div>
					<div class="form-group">
						<label><?=$data["language_data"]["val41"]?>:</label>
						<input type="text" id="email" class="form_1" value="" />
					</div>
					<div class="form-group">
						<label><?=$data["language_data"]["val49"]?>:</label>
						<input type="password" id="password" class="form_1" value="" />
					</div>
					<div class="form-group">
						<label><?=$data["language_data"]["val97"]?>:</label>
						<input type="password" id="repeat_password" class="form_1" value="" />
					</div>
					<div class="form-group"> 
						<input type="submit" value="<?=$data["language_data"]["val98"]?>" id="register-button" class="button_1" />
					</div>
				</div>
			</div>
			<div class="col-sm-6 padding_0">
				<div class="authorization_div">
					<div class="title"><?=$data["language_data"]["val99"]?></div>
					<div class="form-group" id="resalt2" style="display:none">
					</div>
					<div class="form-group">
						<label><?=$data["language_data"]["val41"]?>:</label>
						<input type="text" id="login-username" class="form_1" value="" />
					</div>
					<div class="form-group">
						<label><?=$data["language_data"]["val49"]?>:</label>
						<input type="password" id="login-password" class="form_1" value="" />
					</div>
					<div class="form-group"> 
						<input type="submit" value="<?=$data["language_data"]["val100"]?>" id="login-button" class="button_2"/>
					</div>
				</div>
			</div>
		 <?php } ?>


		  <?php 
		  	if(isset($_SESSION["greek_id"])) { 
		  	$font = (LANG=="ge") ? ' style="font-family:bpg_anna;"' : ' style="font-family:roboto;"'; 
		  ?>

		  <div class="row"<?=$font?>>
		 <div class="col-md-3">
		 	<div class="users-profile-picture">
		 		<img src="<?=TEMPLATE?>img/profile.jpg" width="100%" alt="usersprofile" />
		 	</div>

		 	<ul class="nav nav-pills usersnavigation" style="margin-top:20px;">
			 <!--  <li role="presentation" class="active">
				<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" onclick="remo(this)">
			  		<?=$data["language_data"]["val109"]?> ( 2 )
			  	</a>
			  </li> -->
			  <li role="presentation" class="active">
			  	<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" onclick="remo(this)">
			  		<?=$data["language_data"]["val108"]?>
			  	</a>
			  </li>
			  <li role="presentation">
			  	<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" onclick="remo(this)">
			  		<?=$data["language_data"]["val110"]?>
			  	</a>
			  </li>
			</ul>
		 </div>
		 <div class="col-md-9">

		 	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			 

			  
			   

			<!-- TAGS START -->
		   <div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="headingTwo">
			      <h4 class="panel-title">
			          <?=$data["language_data"]["val108"]?>
			      </h4>
			    </div>
			    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
			      <div class="panel-body">
			       		
			      	<div class="register_div">
			      		<div class="form-group" id="profile-resalt" style="display:none">
						</div>

			      		<div class="form-group">
							<label><?=$data["language_data"]["val114"]?>: <font color="red">*</font></label>
							<input type="text" id="username" class="form_1" value="<?=$_SESSION["greek_user"]?>" disabled="disabled" />
						</div>

						<div class="form-group">
							<label><?=$data["language_data"]["val96"]?>: <font color="red">*</font></label>
							<input type="text" id="profile-namelname" class="form_1" value="<?=$_SESSION["greek_namelname"]?>" />
						</div>					

						<div class="form-group">
							<label><?=$data["language_data"]["val103"]?>:</label>
							<select class="form1" id="profile-gender">
								<option value=""><?=$data["language_data"]["val104"]?></option>
								<option value="male" <?=($_SESSION["greek_gender"]=="male") ? 'selected="selected"' : ''?>><?=$data["language_data"]["val105"]?></option>
								<option value="female" <?=($_SESSION["greek_gender"]=="female") ? 'selected="selected"' : ''?>><?=$data["language_data"]["val106"]?></option>
							</select>
						</div>

						<div class="form-group">
							<label><?=$data["language_data"]["val115"]?>: </label>
							<input type="text" id="profile-email" class="form_1" value="<?=$_SESSION["greek_email"]?>" />
						</div>

						<div class="form-group">
							<label><?=$data["language_data"]["val107"]?>:</label>
							<input type="text" id="profile-contactnumber" class="form_1" value="<?=$_SESSION["greek_mobile"]?>" />
						</div>
						
						<div class="form-group"> 
							<input type="submit" value="<?=$data["language_data"]["val113"]?>" id="update-profile" class="button_1" />
						</div>
					</div>

			      </div>
			    </div>
			  </div>
		    <!-- TAGS ENDS -->

		    <!-- CHANGE PASSWORD START -->
		    <div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="headingThree">
			      <h4 class="panel-title">
			          <?=$data["language_data"]["val110"]?>
			      </h4>
			    </div>
			    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
			      <div class="panel-body">
			        <div class="form-group" id="changepass-resalt" style="display:none">
					</div>

			      	<div class="register_div">
					<div class="form-group">
						<label><?=$data["language_data"]["val111"]?>: <font color="red">*</font></label>
						<input type="password" id="password-old" class="form_1" value="" />
					</div>
					<div class="form-group">
						<label><?=$data["language_data"]["val112"]?>: <font color="red">*</font></label>
						<input type="password" id="password-new" class="form_1" value="" />
					</div>

					<div class="form-group">
						<label><?=$data["language_data"]["val116"]?>: <font color="red">*</font></label>
						<input type="password" id="password-repeat" class="form_1" value="" />
					</div>

				
					
					<div class="form-group"> 
						<input type="submit" value="<?=$data["language_data"]["val98"]?>" id="changepass-button" class="button_1" />
					</div>
				</div>







			      </div>
			    </div>
			  </div>
		    <!-- CHANGE PASSWORD END -->


			</div>


			 





		 	
		 </div>
		</div>
		 <?php } ?>


</div>

		
	
</div>
<?php @include("parts/footer.php"); ?>