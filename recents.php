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
?>
<style>
    h1 {
    color: white;
    }
</style>
<div class="recentsContainer">
  <table class="table table-unbordered">
    <thead>
      <tr>
        <th><h1 style="text-align: center; letter-spacing: 4px; font-family: georgia;">Recents</h1></th>
      </tr>
    </thead>
    <tbody>
      <?php

        $query = $handler->query("select * from tbleventlist order by id DESC limit 10");
        $results = $query->fetchAll();
        echo "<br>";
        foreach ($results as $result) {
          $output = $result[0] . '. Date: ' . $result[1] . ' Address: ' . $result[4] ;
          echo '<tr><td style="font-family: sans-serif; font-size: 25px; font-stretch: 2px; font-weight: 3px; text-align: center;">'. $output . '</td></tr>';
        }

      ?>

    </tbody>
  </table>
</div>

