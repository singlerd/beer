<?php
require_once __DIR__ . '/../core/init.php';
$beer = new Beer();
$beers = $beer -> getBeers();
foreach ($beers as $beer){
    $id_product[] = $beer -> id_product;
    $id_category[] = $beer -> id_category;
    $name[] = $beer -> name;
    $description[] = $beer -> description;
    $image[] = $beer -> image;
    $price[] = $beer -> price;
} 
?>
<div class="table-responsive">
  <table class="table table-striped table-hover table-dark animated fadeIn">
    <thead>
      <tr>
        <th scope="col">Category</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
        <th scope="col">Image</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      for($i = 0; $i < count($beers); $i++){
          echo "<tr>";
          echo "<td>$id_category[$i]</td>";
          echo "<td>$name[$i]</td>";
          echo "<td>$description[$i]</td>";
          echo "<td>$price[$i]</td>";
          echo "<td><button id='$id_product[$i]' class='updateImageBeerModal btn btn-info'>Image</button></td>";
          echo "<td><button id='$id_product[$i]' class='updateBeerModal btn btn-warning'>+</button></td>";
          echo "<td><button id='$id_product[$i]' class='deleteBeer btn btn-danger'>-</button></td>";
          echo "</tr>";
      }
    ?>
    </tbody>
  </table>
</div>




