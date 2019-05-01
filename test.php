  <table class="table table-bordered" style="text-align: center;">
    <thead>
      <tr>
        <th style="text-align: center;">Username</th>
        <th style="text-align: center;">Subjects</th>
        <th style="text-align: center;">Ratings</th>
        <th style="text-align: center;">Request</th>
      </tr>
    </thead>
    <tbody>
      <?php
        require_once 'connect.php';

        $query = $handler->query("Select tbl_interestedteachers.teacher_id, tbl_interestedteachers.subject, tblteacher.rating, tbl_interestedteachers.id, tbl_interestedteachers.requestedBy from tbl_interestedteachers, tblteacher where tbl_interestedteachers.teacher_id = tblteacher.email and tbl_interestedteachers.pincode = '" . $_SESSION['pincode'] . "' and status=0");
        $results = $query->fetchAll();

        $query = $handler->query("select * from tbleventlist where location='" . $_SESSION['pincode'] . "' and learner_id='" . $_SESSION['currentUser'] . "' and status=1");
        $liveSession = $query->fetchAll();

        foreach($results as $result)
        {
          $list = $result[4];
          echo '<tr>';
          echo '<td>' . $result[0] . '</td>';
          echo '<td>' . $result[1] . '</td>';
          echo '<td>' . $result[2] . '</td>';

          $flag=1;
          foreach($liveSession as $ls)
          {
            if($result[1]==$ls[3])
            {
            	echo "sdfsdfsdf";
              $flag=0;
            }
          }

          if($_SESSION['currentUser'] == $list)
            echo '<td><input type="button" data-id=' . $result[3] . ' class="btn btn-danger btnSendRequestTeacher" value="Delete"></td>';
          else if($flag==0)
            echo '<td>LIVE</td>';
          else
            echo '<td><input type="button" data-id=' . $result[3] . ' class="btn btn-primary btnSendRequestTeacher" value="send"></td>';

          echo '</tr>';
        }

      ?>
    </tbody>
  </table>