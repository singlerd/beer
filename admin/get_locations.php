<?php
require_once __DIR__ . '/../core/init.php';
$mobile = new Mobile();
$locations = $mobile -> getLocations();
if($locations != null or !empty($locations)){
  foreach ($locations as $location){
      $id[] = $location -> id;
      $lat[] = $location -> lat;
      $lng[] = $location -> lng;
      $website_link[] = $location -> website_link;
      $pub_name[] = $location -> pub_name;
      $description[] = $location -> description;
      $city_address[] = $location -> city_address;
      $image[] = $location -> pub_image;
  } 
?>

<div class="table-responsive">
  <table class="table table-striped table-hover table-dark animated fadeIn">
    <thead>
      <tr>
        <th scope="col">Pub name</th>
        <th scope="col">Address</th>
        <th scope="col">Description</th>
        <th scope="col">Website link</th>
        <th scope="col">Lat</th>
        <th scope="col">Lng</th>
        <th scope="col">Image</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      for($i = 0; $i < count($locations); $i++){
          echo "<tr>";
          echo "<td>$pub_name[$i]</td>";
          echo "<td>$city_address[$i]</td>";
          echo "<td>$description[$i]</td>";
          echo "<td>$website_link[$i]</td>";
          echo "<td>$lat[$i]</td>";
          echo "<td>$lng[$i]</td>";
          echo "<td><button id='$id[$i]' class='updateImageModal btn btn-info'>Image</button></td>";
          echo "<td><button id='$id[$i]' class='updateModal btn btn-warning'>+</button></td>";
          echo "<td><button id='$id[$i]' class='deleteLocation btn btn-danger'>-</button></td>";
          echo "</tr>";
      }
    ?>
    </tbody>
  </table>
</div>

<?php 
} else {
  echo "No locations found!";
} 
?>

