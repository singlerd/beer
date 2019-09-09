<?php

if (!isset($_SESSION['user']))
    Redirect::to(404);
    ?>
<div class="card card-cascade wider reverse pt-5 text-center" >
    <div class="container pb-5">
        <div class="card animated fadeInDown">
            <div class="card-header">
                <h2>KORPA</h2>
            </div>
            <div class="card-body">
<?php

require 'db_config.php';
require 'functions.php';


$id_user = $_SESSION['user'];


$first_last_name = get_user($id_user);
$user_mail = get_user_email($id_user);
?>

                <div class="card-body">
                    <i style="font-size: 20px" class="fa fa-user" aria-hidden="true"></i> <?php echo $first_last_name; ?> <br />
                    <i class="fa fa-envelope-open" aria-hidden="true"></i> <?php echo $user_mail; ?>
                </div>

                <?php

if(is_array($_SESSION['cart']))
{
    $sum=0;

    foreach($_SESSION['cart'] as $id_product=>$amount)
    {

        $sql = "SELECT name,price FROM product WHERE id_product = '$id_product' ORDER BY name ASC";
        $result = mysqli_query($connection,$sql) or die(mysqli_error($connection));
        if (mysqli_num_rows($result)>0)
        {

            while ($record = mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
                $sum+=$amount*$record['price'];
                echo "<p><b>$record[name]</b> </p>-  $amount x $record[price] RSD = " .$amount*$record['price']." RSD <a class='btn-sm btn-danger' href=\"delete.php?id_product=$id_product\">Ukloni iz korpe</a><hr />";
            }

        }
    }

}

if($sum!=0) {
    echo "Ukupno: $sum RSD";
    echo "<p><a class='btn-lg btn-outline-warning waves-effect' href=\"check_out.php\">Kupi</a></p><br />";
}
else{
    echo "<br />Nemaš ništa u korpi.";
    echo "<br /><a href=\"store.php\" class=\"btn sunny-morning-gradient\"><i class=\"fa fa-clone left\"></i> Prodavnica</a>";
}
?>

            </div>
        </div>
    </div>
</div>