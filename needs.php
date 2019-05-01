<div class="leftNeeds">
	<div class="addInterestsContainer" style="background-color: rgb(50, 50, 50);">
		<h3 style="text-align: center; letter-spacing: 4px; font-family: georgia; border-bottom: 3px groove; padding-bottom: 5px;">Needs</h3>	
		<br><br>
		<center>
			<span style="font-size: 15px;">Subject:</span> &nbsp;&nbsp;&nbsp;&nbsp;
		<select name="Subject" id="subjectNeeds" style="font-size: 16px; height: 25px; width: 100px; color:black; text-align: center;">
			  <option value="Maths">Maths</option>
			  <option value="Science">Science</option>
			  <option value="History">History</option>
		</select>
		<br>
		<br>
		<input class="btn" type="button" name="Submit" value="Send" id="submitNeeds" style="width: 100px; font-size: 15px; background: rgb(110, 110, 110);">
		<br><br>
		</center>
	</div>
	<div class="requestedListContainer">
		<h3>Requested List</h3>
		<table class="table table-bordered" style="text-align: center;">
		    <thead>
		      <tr>
		        <th style="text-align: center;">Subject</th>
		      </tr>
		    </thead>
		    <tbody>
		      <?php
		        require_once 'connect.php';
		        $query = $handler->query("select * from tbl_neededteachers where pincode='" . $_SESSION['pincode'] . "' and status=0");
		        $results = $query->fetchAll();

		        foreach($results as $result)
		        {
		          echo '<tr>';
		          echo '<td>' . $result[2] . '</td>';
		          echo '</tr>';
		        }

		      ?>
		    </tbody>
		</table>
	</div>
	<div class="liveSessionContainer">
		<h3>Live Session</h3>
		<table class="table table-bordered" style="text-align: center;">
		    <thead>
		      <tr>
		        <th style="text-align: center;">Subject</th>
		      </tr>
		    </thead>
		    <tbody>
		      <?php
		        require_once 'connect.php';
		        $query = $handler->query("select * from tbleventlist where location='" . $_SESSION['pincode'] . "' and learner_id='" . $_SESSION['currentUser'] . "' and status=1");
		        $results = $query->fetchAll();

		        foreach($results as $result)
		        {
		          echo '<tr>';
		          echo '<td>' . $result[3] . '</td>';
		          echo '</tr>';
		        }

		      ?>
		    </tbody>
		</table>
	</div>
</div>