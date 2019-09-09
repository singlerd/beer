<?php

function get_user($id_user)
{
    global $connection;
    $sql = "SELECT firstname, lastname FROM users 
  	 		 WHERE id_user = '$id_user'";
    $result = mysqli_query($connection,$sql) or die(mysqli_error($connection));

    if (mysqli_num_rows($result)>0)
    {
        while ($record = mysqli_fetch_array($result,MYSQLI_BOTH))
            $first_last_name = $record['firstname']." ".$record['lastname'];
    }
    return  $first_last_name ;

}


function get_user_email($id_user)
{
    global $connection;
    $sql = "SELECT email FROM users WHERE id_user = '$id_user'";
    $result = mysqli_query($connection,$sql) or die(mysqli_error($connection));

    if (mysqli_num_rows($result)>0)
    {
        while ($record = mysqli_fetch_array($result,MYSQLI_BOTH))
            $email = $record['email'];
    }
    return $email;

}

function get_product_name($id_product)
{
    global $connection;
    $sql = "SELECT name FROM product WHERE id_product = '$id_product'";


    $result = mysqli_query($connection,$sql) or die(mysqli_error($connection));

    if (mysqli_num_rows($result)>0)
    {
        while ($record = mysqli_fetch_array($result,MYSQLI_BOTH))
            $name = $record['name'];
    }
    return $name;

}

function get_beer_image($id_product)
{
    global $connection;
    $sql = "SELECT image FROM product WHERE id_product = '$id_product'";

    $result = mysqli_query($connection,$sql) or die(mysqli_error($connection));

    if (mysqli_num_rows($result)>0)
    {
        while ($record = mysqli_fetch_array($result,MYSQLI_BOTH))
            $image = $record['image'];
    }
    return $image;
}

function get_beer_desc($id_product)
{
    global $connection;
    $sql = "SELECT description FROM product WHERE id_product = '$id_product'";

    $result = mysqli_query($connection,$sql) or die(mysqli_error($connection));

    if (mysqli_num_rows($result)>0)
    {
        while ($record = mysqli_fetch_array($result,MYSQLI_BOTH))
            $description = $record['description'];
    }
    return $description;
}
function insert_profile_image($image, $id)
{
    global $connection;
    $sql = "UPDATE users SET photo='$image' WHERE id_user=$id";
    $result = mysqli_query($connection,$sql) or die(mysqli_error($connection));
}

function get_profile_image($id)
{
    global $connection;
    $sql = "SELECT photo FROM users WHERE id_user=$id";
    $result = mysqli_query($connection,$sql) or die(mysqli_error($connection));

    if (mysqli_num_rows($result)>0)
    {
        while ($record = mysqli_fetch_array($result,MYSQLI_BOTH))
            $photo = $record['photo'];
    }
    return $photo;
}

function get_orders()
{
    global $connection;
    $sql = "SELECT * FROM cart_order";
    $result = mysqli_query($connection,$sql) or die(mysqli_error($connection));
    if (mysqli_num_rows($result)>0)
    {
        while ($record = mysqli_fetch_array($result,MYSQLI_BOTH))
            $order_text = $record['order_text'];
    }
    return $order_text;
}

function order_number()
{
    $today = date("Ymd");
    $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
    return $unique = $today . $rand;
}

function update_cart_order($id)
{
    global $connection;
    if( isset($_POST['select_status'])) {
        $select_status = $_POST['select_status'];

        $sql = "UPDATE cart_order SET status = '$select_status' WHERE id_cart_order = $id";
        $result = mysqli_query($connection,$sql) or die(mysqli_error($connection));
    }


}

function enumDropdown($table_name, $column_name, $echo = false)
{
    global $connection;
    $selectDropdown = "<select id='select_status' name='select_status'>";
    $result = mysqli_query($connection,"SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
       WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'")
    or die (mysqli_error());

    $row = mysqli_fetch_array($result);
    $enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));

    foreach($enumList as $value)
        $selectDropdown .= "<option value=\"$value\">$value</option>";

    $selectDropdown .= "</select>";

    if ($echo)
        echo $selectDropdown;

    return $selectDropdown;
}

function send_mail($email,$message, $subject)
{

    $header = '';

    $header .= "From: user <'www.pivopije.com'>\n";
    $header .= "X-Mailer: PHP\n";
    $header .= "X-Priority: 1\n";
    $header .= "CC: user\n";
    $header .= "Content-Type: text/html; charset=UTF-8\n";

    $to = $email;

    mail($to, $subject, $message, $header);

}
function get_status($id)
{
    global $connection;
    $sql = "SELECT status FROM cart_order WHERE id_cart_order=$id";
    $result = mysqli_query($connection,$sql) or die(mysqli_error($connection));

    if (mysqli_num_rows($result)>0)
    {
        while ($record = mysqli_fetch_array($result,MYSQLI_BOTH))
            $status = $record['status'];
    }
    return $status;
}
?>