	<div class="addInterestsContainer" style="color: white">
		<h3 style="text-align: center; letter-spacing: 4px; font-family: georgia; border-bottom: 3px white groove; padding-bottom: 5px;">Add Interests</h3>
		
		<br>
		<center>
		<span style="font-size: 15px; margin-right: 10px;">Subject:</span>
		<select name="Subject" id="subject" style="font-size: 16px; height: 25px; width: 100px; color:black; text-align: center;">
			  <option value="Maths">Maths</option>
			  <option value="Science">Science</option>
			  <option value="History">History</option>
		</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<span style="font-size: 15px; margin-right: 10px;">Location:</span>
		<select name="location" id="location" style="font-size: 15px; height: 25px; width: 100px; color:black; text-align: center;">
			  <option value="MODASA">MODASA</option>
			  <option value="LUNAWADA">LUNAWADA</option>
		</select>
		<br><br>
     	<input class="btn" type="button" name="Submit" value="Submit" id="submitInterest" style="width: 100px; font-size: 15px; background: rgb(110, 110, 110);">	
     	<br>
     	<hr>
     	<div class="neededTeacherContainer">
	     	<h3>Needed Teachers</h3>
	     	<br>
	     	<table class="table table-bordered" style="text-align: center;">
	    	<thead>
		      <tr>
		        <th style="text-align: center;">Subjects</th>
		        <th style="text-align: center;">Locations</th>
		        <th style="text-align: center;">Approve</th>
		      </tr>
		    </thead>
		    <tbody>
		    	<?php

					try 
					{
						 $handler = new PDO('mysql:host=127.0.0.1;dbname=dataHackathon','root','');
						 $handler -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					} 
					catch (PDOException $e) 
					{
						echo $e->getMessage();
						die();
					}

					$query = $handler->query("select * from tbl_neededteachers where status=0");

					$results = $query->fetchAll();

					foreach ($results as $result) {
						# code...
						echo '<tr>';
						echo '<td>' . $result[2] . '</td>';
						echo '<td>' . $result[3] . '</td>';
						echo '<td><input type="button" data-id=' . $result[0] . ' class="btn btn-success btnApporveClass" value=" ✔ "></td>';
						echo '</tr>';
					}

		    	?>
	    	</tbody>
	  		</table>
  		</div> 
    	</center>
	</div>