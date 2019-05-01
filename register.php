<div class="registerContainer">
  <form id="registerform">
    <div style="text-align:center">
    
      <span class="dot"><h1>✍</h1></span>
    </div>
    <br>
    <div class="form-group">
      <input type="text" class="form-control signupBox" id="usr" autocomplete="off" placeholder="✐    Name" style="border-color: white; color: white">
    </div>
    <div class="form-group" style="border-color: white;">
      <input type="text" class="form-control signupBox" id="email" autocomplete="off" placeholder="📩   Email" style="border-color: white; color: white">
    </div>
    <div class="form-group">
      <input type="no" class="form-control signupBox" id="phno" autocomplete="off" placeholder="☏    Phone Number" style="border-color: white; color: white">
    </div>
    
    <div class="form-group" style="border-color: white;">
      <input type="password" class="form-control signupBox" id="pwd" autocomplete="off" placeholder="🔒     Password" style="border-color: white; color: white">
    </div>
    <div class="form-group">
      <input type="password" class="form-control signupBox" id="conpwd" autocomplete="off" placeholder="🔒    Confirm Password" style="border-color: white; color: white">
    </div>
    <!--<div id="addressField"> 
     <fieldset>
        <legend>Address</legend>
        <input type="text signupBox" id="state" autocomplete="off" placeholder="State"><br>
        <input type="text signupBox" id="pincode" autocomplete="off" placeholder="Pin Code"><br>
        <input type="text signupBox" id="district" autocomplete="off" placeholder="District">
      </fieldset>
    </div> -->
    <div class="form-group">
      <input type="text" class="form-control signupBox" id="state" autocomplete="off" placeholder="State" style="border-color: white; color: white">
    </div>
    <div class="form-group">
      <input type="no" class="form-control signupBox" id="pincode" autocomplete="off" placeholder="Pin Code" style="border-color: white; color: white">
    </div>
    <div class="form-group">
      <input type="text" class="form-control signupBox" id="district" autocomplete="off" placeholder="District" style="border-color: white; color: white">
    </div> 
    
    <label class="radio-inline" style="color: rgb(110, 110, 110);"><input type="radio" id="teacher" name="optradio" checked>Teacher</label>
    <label class="radio-inline" style="color: rgb(110, 110, 110);"><input type="radio" id="learner" name="optradio">Learner</label>
    <br>
    <br>
    <div style="padding-top: 10px;">
      <input type="button" class="btn btn-primary form-control" value="Register" id="registerSubmit" />
    </div>
    <br>
    <p id="judge"></p>
    <span id="loginME" style="color: rgb(110, 110, 110); font-weight: bold; cursor: pointer;">Back to Login</span>
  </form>
</div>



