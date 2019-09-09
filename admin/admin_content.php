<?php 
$username = $user -> data() -> username;
include "error.php";
require 'store/db_config.php';
require 'store/functions.php';

$id_user = $_SESSION['user'];


?>

<div class="card card-cascade wider reverse pt-5 text-center" >
    <div class="container pb-5">
        <div class="card animated fadeInDown">
            <div class="card-header">
                <h2>ADMIN PAGE</h2>
            </div>
            <div class="card-body">
                <h5 class="card-title">Welcome <?php echo $username ?>!</h5>
                <h3 class="card-text">Don't touch anything if you are drunk!</h3>
            </div>
        </div>
    </div>
</div>

<div class="card card-cascade wider reverse pt-5" >
    <div class="container pb-5">
        <?php 
        if(isset($_GET["messageLocation"])){
            messageLocation($_GET["messageLocation"]);
        } 
        ?>
        <div class="card animated fadeInUp">
            <div class="card-header">
                <h3>Map</h3>
            </div>
            <div class="card-body">
                <h5 class="card-title">Locations</h5>
                <p class="card-text">Here you can insert, update or delete craft beer locations for our map</p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertLocationModal">Insert</button>
                <button type="button" id="listLocations" class="btn btn-info">List</button>
                <div id="locations" class="mt-3"></div>
            </div>
        </div>
    </div>
</div>

<div class="card card-cascade wider reverse pt-5" >
    <div class="container pb-5">
        <?php 
        if(isset($_GET["messageBeer"])){
            messageBeer($_GET["messageBeer"]);
        } 
        ?>
        <div class="card animated fadeInUp">
            <div class="card-header">
                <h3>Products</h3>
            </div>
            <div class="card-body">
                <h5 class="card-title">Beer</h5>
                <p class="card-text">Here you can insert, update or delete craft beer</p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertBeerModal">Insert</button>
                <button type="button" id="listBeers" class="btn btn-info">List</button>
                <div id="beers" class="mt-3"></div>
            </div>
        </div>
    </div>
</div>



<!-- Modals -->
<!-- Insert Modal (Location) -->
<div class="modal fade" id="insertLocationModal" tabindex="-1" role="dialog" aria-labelledby="insertLocationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="insertLocationModalLabel">Insert new location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="p-2" action="admin/modify_location.php" id="insertLocation" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="pubName">Pub name</label>
                <input type="text" name="pub_name" class="form-control" id="pub_name" placeholder="Enter pub name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control" id="description" placeholder="Enter description">
            </div>
            <div class="form-group">
                <label for="website_link">Website link</label>
                <input type="text" name="website_link" class="form-control" id="website_link" placeholder="Enter website link">
            </div>
            <div class="form-group">
                <label for="lat">Latitude</label>
                <input type="text" name="lat" class="form-control" id="lat"  placeholder="Enter latitude">
            </div>
            <div class="form-group">
                <label for="lng">Longitude</label>
                <input type="text" name="lng" class="form-control" id="lng" placeholder="Longitude">
            </div>
            <div class="form-group">
                <label for="city_address">City and Address</label>
                <input type="text" name="city_address" class="form-control" id="city_address" placeholder="City and Address">
            </div>
            <div class="form-group">
                <label for="inputImage">Image</label>
                <input type="file" name="image" class="form-control-file" id="inputImage">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_upload" name="btn_upload" class="btn btn-primary">Insert</button>
                <input type="hidden" name="id_location" id="id_location">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Update Modal (Location) -->
<div class="modal fade" id="updateLocationModal" tabindex="-1" role="dialog" aria-labelledby="updateLocationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateLocationModalLabel">Update location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="p-2" action="admin/modify_location.php" id="updateLocation" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="update_pub_name">Pub name</label>
                <input type="text" name="pub_name" class="form-control" id="update_pub_name" placeholder="Enter pub name">
            </div>
            <div class="form-group">
                <label for="update_description">Description</label>
                <input type="text" name="description" class="form-control" id="update_description" placeholder="Enter description">
            </div>
            <div class="form-group">
                <label for="update_website_link">Website link</label>
                <input type="text" name="website_link" class="form-control" id="update_website_link" placeholder="Enter website link">
            </div>
            <div class="form-group">
                <label for="update_lat">Latitude</label>
                <input type="text" name="lat" class="form-control" id="update_lat"  placeholder="Enter latitude">
            </div>
            <div class="form-group">
                <label for="update_lng">Longitude</label>
                <input type="text" name="lng" class="form-control" id="update_lng" placeholder="Longitude">
            </div>
            <div class="form-group">
                <label for="city_address">City and Address</label>
                <input type="text" name="city_address" class="form-control" id="update_city_address" placeholder="City and Address">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_upload" name="btn_upload" class="btn btn-primary">Update</button>
                <input type="hidden" name="update_id_location" id="update_id_location">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Update Image Modal (Location) -->
<div class="modal fade" id="updateImageModal" tabindex="-1" role="dialog" aria-labelledby="updateImageModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateImageModalLabel">Update image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="p-2" action="admin/modify_location.php" id="updateImage" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="pub_image">Current image</label><br>
                <img id="pub_image" src="" alt="Image error">
            </div>
            <div class="form-group">
                <label for="inputImage">Change image</label>
                <input type="file" name="image" class="form-control-file" id="inputImage">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_upload" name="btn_upload" class="btn btn-primary">Update</button>
                <input type="hidden" name="image_update_id_location" id="image_update_id_location">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Insert Modal (Beer) -->
<div class="modal fade" id="insertBeerModal" tabindex="-1" role="dialog" aria-labelledby="insertBeerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="insertBeerModalLabel">Insert new location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="p-2" action="admin/modify_beer.php" id="insertBeer" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="id_category">Category</label>
                <select class="form-control" name="id_category" id="id_category">
                    <?php 
                        $stmt = $con -> prepare("SELECT * FROM category");
                        $stmt -> execute(); 
                        if($stmt -> rowCount() > 0){
                            while($row = $stmt -> fetch(PDO::FETCH_BOTH)){
                                echo "<option value='" . $row['id_category'] . "'>" . $row['name'] . "</option>";
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control" id="description" placeholder="Enter description">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control" id="price"  placeholder="Enter price">
            </div>
            <div class="form-group">
                <label for="origin">Origin</label>
                <input type="text" name="origin" class="form-control" id="origin"  placeholder="Origin">
            </div>
            <div class="form-group">
                <label for="inputImage">Image</label>
                <input type="file" name="image" class="form-control-file" id="inputImage">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_upload" name="btn_upload" class="btn btn-primary">Insert</button>
                <input type="hidden" name="id_product" id="id_product">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Update Modal (Beer) -->
<div class="modal fade" id="updateBeerModal" tabindex="-1" role="dialog" aria-labelledby="updateBeerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateBeerModalLabel">Insert new location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="p-2" action="admin/modify_beer.php" id="updateBeer" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="update_id_category">Category</label>
                <select class="form-control" name="id_category" id="update_id_category">
                <?php 
                    $stmt = $con -> prepare("SELECT * FROM category");
                    $stmt -> execute(); 
                    if($stmt -> rowCount() > 0){
                        while($row = $stmt -> fetch(PDO::FETCH_BOTH)){
                            echo "<option value='" . $row['id_category'] . "'>" . $row['name'] . "</option>";
                        }
                    }
                ?>
                </select>
            </div>
            <div class="form-group">
                <label for="update_name">Name</label>
                <input type="text" name="name" class="form-control" id="update_name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="update_beer_description">Description</label>
                <input type="text" name="description" class="form-control" id="update_beer_description" placeholder="Enter description">
            </div>
            <div class="form-group">
                <label for="update_price">Price</label>
                <input type="text" name="price" class="form-control" id="update_price"  placeholder="Enter price">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_upload" name="btn_upload" class="btn btn-primary">Update</button>
                <input type="hidden" name="update_id_product" id="update_id_product">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Update Image Modal (Beer) -->
<div class="modal fade" id="updateImageBeerModal" tabindex="-1" role="dialog" aria-labelledby="updateImageBeerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateImageModalBeerLabel">Update image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="p-2" action="admin/modify_beer.php" id="updateImage" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="beer_image">Current image</label><br>
                <img id="beer_image" src="" alt="Image error">
            </div>
            <div class="form-group">
                <label for="inputImage">Change image</label>
                <input type="file" name="image" class="form-control-file" id="inputImage">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_upload" name="btn_upload" class="btn btn-primary">Update</button>
                <input type="hidden" name="image_update_id_product" id="image_update_id_product">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="card card-cascade wider reverse pt-5 text-center" >
    <div class="container pb-5">
        <div class="card animated fadeInDown">
            <div class="card-header">
                <h2>ORDERS</h2>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead class="black white-text">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Order</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Order Number</th>
                        <th scope="col">Status</th>
                        <th>Edit</th>


                    </tr>
                    </thead>
                    <tbody>


                <?php

                $stmt = $con ->prepare("SELECT users.firstname, users.lastname, users.email,cart_order.order_text, cart_order.total_price, cart_order.id_cart_order, cart_order.status, cart_order.order_number FROM users LEFT JOIN cart_order ON users.id_user = cart_order.id_user");
                $stmt-> execute();
                if($stmt ->rowCount() > 0){
                    while ($row = $stmt ->fetch(PDO::FETCH_ASSOC)){
                        $email = $row['email'];
                        $lastname = $row['lastname'];
                        $firstname = $row['firstname'];
                        $cart_order = $row['order_text'];
                        $total_price = $row['total_price'];
                        $id_cart_order = $row['id_cart_order'];
                        $status = $row['status'];
                        $order_number = $row['order_number'];

                      ?>
                        <tr>
                            <th scope="row"><?php echo $id_cart_order;?></th>
                            <td><?php echo "<h5>".$email."</h5>"; ?></td>
                            <td><?php echo "<h5>".$firstname." ".$lastname."</h5>" ?></td>
                            <td> <?php echo $cart_order; ?></td>
                            <td><?php echo "<h5>".$total_price."</h5>";  ?></td>
                            <td><?php echo "<h5>".$order_number."</h5>"?></td>
                            <td><?php echo "<h5>". $status."</h5>"?></td>
                            <td>
                                <a class="formAnchor" id="a" href="edit_order.php?id=<?php echo $id_cart_order;?>">Change</a>



                            </td>

                        </tr>



                        <?php


                        $email = get_user_email($id_user);

                       /* if($status=="In Progress")
                        {

                            send_mail($email,$order_number,"U toku");

                        }elseif ($status=="Delivered")
                        {
                            send_mail($email,$order_number,'Isporuceno');
                        }*/



                    }

                }

                ?>
                    </tbody>
                </table>
            </div>






            </div>
        </div>
    </div>
</div>