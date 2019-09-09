<?php
require 'includes/header.php';
require 'includes/navigation.php';

require 'store/db_config.php';
require 'store/functions.php';
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $getId = mysqli_real_escape_string($connection, $id);

    if (isset($_POST['select_status'])) {
        $select_status = $_POST['select_status'];

        $sql = "UPDATE cart_order SET status = '$select_status' WHERE id_cart_order = $getId";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
    }
}
        $sql = "SELECT users.firstname,users.photo, users.lastname,users.username, users.email,cart_order.order_text, cart_order.total_price, cart_order.id_cart_order, cart_order.status, cart_order.order_number FROM users LEFT JOIN cart_order ON users.id_user = cart_order.id_user WHERE cart_order.id_cart_order = $getId";
        $result = mysqli_query($connection,$sql) or die(mysqli_error($connection));
        if (mysqli_num_rows($result)>0) {
            while ($record = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                 $order_text = $record['order_text'];
                 $user_photo = $record['photo'];
                 $firstname = $record['firstname'];
                 $lastname = $record['lastname'];
                 $username = $record['username'];
                 $user_email = $record['email'];
                 $order_number = $record['order_number'];
            }
        }
?>
    <div class="card card-cascade wider reverse pt-5 text-center" >
        <div class="container pb-5">
            <div class="card animated fadeInDown">
                <div class="card-header">
                    <h2>Edit Order </h2>
                </div>
                <div class="card-body ">
                    <div class="border">
                        Order Code:<h1><?php echo $order_number; ?></h1>
                    </div>
                </div>
                <div class="row">
                        <div class="card-body col-lg-6 col-xl-6">
                            <h5 class="card-title"></h5>

                            <div class="card">
                                <div class="card-header">
                                    Order
                                </div>
                                <div class="card-body">
                                    <?php echo $order_text; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-body col-lg-6 col-xl-6">
                            <div class="avatar mx-auto white">
                                Email:<h5><?php echo $user_email;?></h5>
                                Full Name:<h5><?php echo $firstname." ".$lastname?></h5>
                                Username:<h5><?php echo $username;?></h5>
                                <img width="200" src="images/profile/<?php echo $user_photo; ?>" alt="" class="rounded-circle img-fluid">
                            </div>
                            <br />
                            <form  action="" name="myForm"  method="post" id="myForm">
                                <select class="browser-default custom-select" name="select_status" id="bar">
                                    <option value="<?php echo get_status($getId)?>"><?php echo get_status($getId); ?></option>
                                    <?php
                                    $mail = $user_email;
                                    $message.= "Your code for your order is: <strong>$order_number</strong> <br/>";
                                    $message.= "Your order is:<br />$order_text";
                                    if(get_status($getId) == 'Ordered')
                                    {
                                        echo "<option value='In Progress'>In Progress</option>";
                                    }elseif(get_status($getId) == 'In Progress')
                                    {
                                        send_mail($mail,$message,'Order in progress');
                                        echo "<option value='Delivered'>Delivered</option>";
                                    }elseif (get_status($getId) == 'Delivered'){
                                        send_mail($mail,$message,'Order Delivered');
                                        echo "!";
                                    }
                                    ?>
                                </select>
                                <input class="btn btn btn-outline-warning waves-effect" type="submit" name="submit">
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require 'includes/footer.php'; ?>

