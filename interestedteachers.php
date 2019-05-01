<style>
    h1 {
    color: black;
    text-shadow: 2px 2px 4px #000000;
}
</style>
  <div class="interestedTeachersContainer" style="color: white">
  <h1 style="text-align: center; letter-spacing: 4px; font-family: georgia; color: white">Interested Teachers</h1>
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

        foreach($results as $result)
        {
          $list = $result[4];
          echo '<tr>';
          echo '<td>' . $result[0] . '</td>';
          echo '<td>' . $result[1] . '</td>';
          echo '<td>' . $result[2] . '</td>';

          if($_SESSION['currentUser'] == $list)
            echo '<td><input type="button" data-id=' . $result[3] . ' class="btn btn-danger btnSendRequestTeacher" value="Delete"></td>';
          else
            echo '<td><input type="button" data-id=' . $result[3] . ' class="btn btn-primary btnSendRequestTeacher" value="send"></td>';

          echo '</tr>';
        }

      ?>
    </tbody>
  </table>
</div>

