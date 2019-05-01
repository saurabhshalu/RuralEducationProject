<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">

		<?php
			$_SESSION['redirected'] = true;
			require './header.php';
		?>
	<div class="teach">
		<div class="left">
			<?php include 'currentsolutions.php'; ?>
      </div>

           <div class="middle"> 
                  
                  <?php include 'addsession.php'; ?>
                  <p style="font-size: 50px;">
                    This is that and that was this, so this and that are that and this.
                  </p>
           </div>
    
    <div class="right">
        <div class="detailsContainer">
          <div style="text-align:center;">
            <br>
            <br>
            <span class="dot"><img id="usericon" src="./img/usericon.png"></span>
            </div>
            <br>
            <br>
            <p style="font-family: sans-serif; font-size: 17px;">Welcome VERMA <!-- add link to the name of the user --></p>
            <br>
            <p style="font-family: sans-serif; font-size: 14px;">- suzench1002@gmail.com <!-- link to the username--></p>
    
            <div class="rating">
               <!-- <ion-icon name="star"></ion-icon> -->
               <span (click)="rate(5)">☆</span>
               <span (click)="rate(4)">☆</span>
               <span (click)="rate(3)">☆</span>
               <span (click)="rate(2)">☆</span>
               <span (click)="rate(1)">☆</span>
            </div>
          </div>
        </div>
      </div>
    
