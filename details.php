
  <div class="detailsContainer">
  	<div style="text-align:center">
		<br>
		<br>
			<span class="dot"><img id="usericon" src="./img/usericon.png"></span>
	</div>
	<br>
	<br>
	<p style="font-family: sans-serif; font-size: 17px;">Welcome <?php echo $_SESSION['name']; ?></p>
  <br>
  <p style="font-family: sans-serif; font-size: 14px;">- <?php echo $_SESSION['currentUser']; ?></p>
    
    <div class="rating">
   <!-- <ion-icon name="star"></ion-icon> -->
   <span (click)="rate(5) checked">☆</span>
   <span (click)="rate(4)">☆</span>
   <span (click)="rate(3)">☆</span>
   <span (click)="rate(2)">☆</span>
   <span (click)="rate(1)">☆</span>
  </div>
<br><br>

  <input type="button" class="btn" name="logout" value="LOGOUT" id="logout" style="background: #B7B7B7;">
</div>