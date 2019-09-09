<?php
require "includes/header.php";
require "includes/navigation.php";
require 'store/db_config.php';

$id_category = mysqli_real_escape_string($connection, $_GET['id_category']);
if(isset($_POST['query'])) {
    $query = "SELECT * FROM product WHERE id_category = '$id_category' ORDER BY name ASC";

}else{
    $query = "SELECT * FROM product WHERE id_category = '$id_category' ORDER BY name ASC";
}

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
?>
<!-- Section: Products v.3 -->
<section class="text-center my-5 ">
    <div class="container">

        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold text-center my-5 padding40"></h2>
        <!-- Section description -->
<!--        <p class="grey-text text-center w-responsive mx-auto mb-5">Webshop je još u izradi. Hvala na razumevanju.</p>-->

        <!-- Grid row -->
        <div class="row">
<?php
if (mysqli_num_rows($result) > 0) {


    while ($record = mysqli_fetch_array($result, MYSQLI_BOTH)) {

        $image = $record['image'];
        $name = $record['name'];
        $description = $record ['description'];
        $price = $record['price'];

        ?>
                    <!-- Grid column -->
                    <div class="col-lg-3 col-md-6 mb-lg-0 mb-4 p-2">
                        <!-- Card -->
                        <div class="card align-items-center">
                            <!-- Card image -->
                            <div class="view overlay">
                                <img src="images/beers/<?php echo $image; ?>" class="card-img-top"
                                     alt="<?php echo $name; ?>">
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <!-- Card image -->
                            <!-- Card content -->
                            <div class="card-body text-center">
                                <!-- Category & Title -->
                                <a href="" class="grey-text">
                                    <h5><?php echo $description; ?></h5>
                                </a>
                                <h5>
                                    <strong>
                                        <a href="" class="dark-grey-text"><?php echo $name ?>
                                            <span class="badge badge-pill danger-color">NOVO</span>
                                        </a>
                                    </strong>
                                </h5>
                                <h4 class="font-weight-bold blue-text">
                                    <strong><?php echo $price; ?> RSD</strong>
                                    <?php  echo "<br><a href=\"cart.php?id_product=$record[id_product]\"><button class='btn-sm btn-outline-warning waves-effect'>Dodaj u korpu</button></a>"; ?>
                                    <?php echo "<a href=\"beer_details.php?id_product=$record[id_product]\"><button class='btn-sm btn-outline-warning waves-effect'>Detaljnije</button></a>"; ?>
                                </h4>
                            </div>
                            <!-- Card content -->
                        </div>
                        <!-- Card -->
                    </div>
                    <!-- Grid column -->
    <?php

    }
}
    ?>
        </div>
    </div>
</section>

<?php
require "includes/footer.php";
?>