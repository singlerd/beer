<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location:blog_post.php");
    exit();
}

require "store/db_config.php";
require "store/functions.php";
$user_id = $_SESSION['user'];

$user = get_user($user_id);
$user_mail = get_user_email($user_id);

$sum = 0;
$message = "";
$number = 1;
$header = "";

if (is_array($_SESSION['cart'])) {
    $date_order = Date("Y-m-d H:i:s");
    $order_number = order_number();
    $sql_i1 = "INSERT INTO cart_order(id_user,date_time,status,order_number) VALUES('$_SESSION[user]','$date_order','ordered','$order_number')";
    var_dump($sql_i1);
    var_dump($_SESSION['cart']);



    $result_i1 = mysqli_query($connection, $sql_i1) or die(mysqli_error($connection));
    $id_cart_order = mysqli_insert_id($connection);
    var_dump($id_cart_order);

    foreach ($_SESSION['cart'] as $id_product => $amount) {

        $sql = "SELECT name,price FROM product WHERE id_product = '$id_product' ORDER BY name ASC";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        if (mysqli_num_rows($result) > 0) {

            while ($record = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                $sum += $amount * $record['price'];
                $message .= "$number. <strong>$record[name]</strong> $amount x $record[price] RSD =<strong>" . $amount * $record['price'] . " RSD </strong>\n .<br />";
                $number++;
                $sql_i = "INSERT INTO cart_order_item(id_cart_order,id_product,amount) VALUES ('$id_cart_order','$id_product','$amount')";

                $result_i = mysqli_query($connection, $sql_i) or die(mysqli_error($connection));
            }
        }

    }

    $message .= "<strong>Ukupno:</strong> $sum RSD <br />";
    $message .= "<strong>Datum porudžbine:</strong> $date_order <br />";
    $mess = nl2br($message);
    $sql_u = "UPDATE cart_order SET order_text='$mess', total_price='$sum' WHERE id_cart_order='$id_cart_order'";

    $result_u = mysqli_query($connection, $sql_u) or die(mysqli_error($connection));

    $email = get_user_email($_SESSION['user']);

    $header .= "From: $user <$user_mail>\n";
    $header .= "X-Mailer: PHP\n";
    $header .= "X-Priority: 1\n";
    $header .= "CC: $user_mail\n";
    $header .= "Content-Type: text/html; charset=UTF-8\n";

    $to = $email;
    $subject = "Porudzbina | Pivopije ";
    mail($to, $subject, $message, $header);

    $_SESSION['cart'] = [];
    header("Location:cart_content.php");
    exit();
}
?>