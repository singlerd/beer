<?php
require 'includes/header.php';
require 'includes/navigation.php';

if(!isset($_SESSION['user'])) {
    Redirect::to(404);
}

require 'store/db_config.php';
require 'store/functions.php';

$id_product = (int)mysqli_real_escape_string($connection, $_GET['id_product']);
$id_user = $_SESSION['user'];

$name = get_product_name($id_product);
$image = get_beer_image($id_product);
$desc = get_beer_desc($id_product);
$first_last_name = get_user($id_user);
$user_mail = get_user_email($id_user);
?>
<div class="container pt-5">
    <!-- Card -->
    <div class="card card-cascade wider reverse">

      <!-- Card image -->
      <div class="view view-cascade overlay" style="width: 200px">
        <img width="200" class="img-fluid text-center" src="images/beers/<?php echo $image ?>" alt="Card image cap">
        <a href="#!">
          <div class="mask rgba-white-slight"></div>
        </a>
          <div class="card">

          </div>
      </div>

      <!-- Card content -->
      <div class="card-body card-body-cascade text-center">

        <!-- Title -->
        <h4 class="card-title"><strong><?php echo $name; ?></strong></h4>
        <!-- Subtitle -->
        <h6 class="font-weight-bold indigo-text py-2"><?php echo $desc; ?></h6>
        <!-- Text -->
        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem perspiciatis voluptatum a, quo nobis, non commodi quia repellendus sequi nulla voluptatem dicta reprehenderit, placeat laborum ut beatae ullam suscipit veniam.
        </p>
      </div>

    </div>
    <!-- Card -->
</div>