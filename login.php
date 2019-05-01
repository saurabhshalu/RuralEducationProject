<div class="loginContainer">
	<form id="loginform">
		<div style="text-align:center">
		<br>
		<br>
			<span class="dot"><h1>🖋</h1></span>
		</div>
		<p id="loginHeading"><h4 style="color: rgb(110, 110, 110);"><center>LOG IN</center> </h4></p>
		<br>
		<br>
		<div>
			<input class="loginTextbox form-control rounded-corner" type="text" name="email" autocomplete="off" placeholder="✉  Email id" id="email">
		</div>
		<br>

		<div>
			<input class="loginTextbox form-control rounded-corner" type="password" name="password" id="password"autocomplete="off" placeholder="🔒   Password">
		</div>
		<br>
		<center>
		<label class="radio-inline" style="color: rgb(110, 110, 110);"><input type="radio" id="teacher" name="optradio" checked>Teacher</label>
    	<label class="radio-inline" style="color: rgb(110, 110, 110);"><input type="radio" id="learner" name="optradio">Learner</label>
    	</center>
    	<br>
		<input type="button" style="border-radius: 20px; background-color: #aaa; border:none;" class="btn btn-success form-control" id="loginSubmit" value="Login">
		<br> <br>
		<center>
		<p id="judge"></p>
		<!-- Link it to register.php -->
		<p class="toandfro" style="font-size: 15px;"></style>Not a member? <span id="registerME" style="color: rgb(110, 110, 110); font-weight: bold; cursor: pointer; font-size: 15px;">Register Now</span></p> 
		</center>
	</form>
</div>