
 
<style>
    h1 {
    color: black;
    text-shadow: 2px 2px 4px #000000;
    }
</style>

  <div class="requestsContainer" style="background: rgb(50,50,50);">
  <h1 style="text-align: center; letter-spacing: 4px; font-family: georgia;">Requests</h1>
  <table class="table table-bordered" style="text-align: center;">
    <thead>
      <tr>
        <th style="text-align: center;">Subjects</th>
        <th style="text-align: center;">Locations</th>
        <th style="text-align: center;">Approve/Deny</th>
      </tr>
    </thead>
    <tbody>

      <?php
        require_once 'connect.php';

        $query = $handler->query("Select tbl_interestedteachers.id, tbl_interestedteachers.teacher_id, tbl_interestedteachers.subject, tbl_interestedteachers.requestedBy, tbllearner.pincode from tbl_interestedteachers, tbllearner where tbl_interestedteachers.status=0 and tbl_interestedteachers.teacher_id='" . $_SESSION['currentUser'] . "' and tbl_interestedteachers.requestedBy<>'". null . "' and tbl_interestedteachers.requestedBy=tbllearner.email");
 
        $results = $query->fetchAll();

        foreach($results as $result)
        {
          echo '<tr>';
          echo '<td>' . $result[2] . '</td>';
          echo '<td>' . $result[4] . '</td>';
          echo '<td><input type="button" data-id=' . $result[0] . ' class="btn btn-success btnApproveRequest" value=" ✔ ">  <input type="button" data-id=' . $result[0] . ' class="btn btn-danger btnRejectRequest" value="x"></td>';
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
            <th style="text-align: center;">Location</th>
            <th style="text-align: center;">Subject</th>
          </tr>
        </thead>
        <tbody>
          <?php
            require_once 'connect.php';
            $query = $handler->query("select * from tbleventlist where teacher_id='" . $_SESSION['currentUser'] . "' and status=1");
            $results = $query->fetchAll();

            foreach($results as $result)
            {
              echo '<tr>';
              echo '<td>' . $result[5] . '</td>';
              echo '<td>' . $result[3] . '</td>';
              echo '</tr>';
            }

          ?>
        </tbody>
    </table>
  </div>