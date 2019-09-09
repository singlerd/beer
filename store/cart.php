<?php

if(!isset($_SESSION['user'])) {
    Redirect::to(404);
}

    require 'store/db_config.php';
    require 'functions.php';


    $id_product = (int)mysqli_real_escape_string($connection, $_GET['id_product']);
    $id_user = $_SESSION['user'];

    $name = get_product_name($id_product);
    $image = get_beer_image($id_product);
    $desc = get_beer_desc($id_product);
    $first_last_name = get_user($id_user);
    $user_mail = get_user_email($id_user);

    ?>

    <div class="card card-cascade wider reverse pt-5 text-center">
        <div class="container pb-5">
            <div class="card animated fadeInDown">
                <div class="card-header">
                    <h2>Stavili ste u korpu:</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col lg-6 col-xl-4 p-3">

                            <!-- Card deck -->
                            <div class="card-deck">
                                <!-- Card -->
                                <div class="card mb-4">
                                    <!--Card image-->
                                    <div class="view overlay">
                                        <img class="card-img-top" src="images/beers/<?php echo $image; ?>"
                                             alt="Card image cap">
                                        <a href="#">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!--Card content-->
                                    <div class="card-body">
                                        <!--Title-->
                                        <h4 class="card-title"><?php echo $name; ?></h4>
                                        <!--Text-->
                                        <p class="card-text"><?php echo $desc ?></p>
                                        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- Card deck -->
                        </div>

                        <div class="col lg-8 col-xl-8">

                            <div class="container pt-3">

                                <div class="card animated fadeInDown">

                                    <div class="card-header">
                                        <h2>Poručilac</h2>
                                    </div>
                                    <div class="card-body text-left">
                                        <i style="font-size: 20px" class="fa fa-user"
                                           aria-hidden="true"></i> <?php echo $first_last_name; ?> <br/>
                                        <i class="fa fa-envelope-open" aria-hidden="true"></i> <?php echo $user_mail; ?>
                                    </div>
                                    <div class="col-lg-4 p-3 text-left">
                                        <form method="post" action="add.php">
                                            <div class="md-form">
                                                <input type="text" id="form1" class="form-control" name="amount"
                                                       size="5"/>
                                                <label for="form1">Količina</label>
                                            </div>
                                            <input type="hidden" name="id_product" value="<?php echo $id_product ?>"/>
                                            <!--                <input type="submit" name="sb" value="ADD" />-->
                                            <input type="submit" name="sb"
                                                   class="btn-lg btn-outline-warning waves-effect" value="Dodaj"/>
                                        </form>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>





