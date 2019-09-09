<div class="card card-cascade wider reverse pt-5 text-center" >
    <div class="container pb-5">
        <div class="card animated fadeInDown">
            <div class="card-header">
                <h2>PRODAVNICA</h2>
            </div>
            <div class="card-body">
    <?php
$sql = "SELECT * FROM category ORDER BY name ASC";
$result = mysqli_query($connection,$sql) or die(mysql_error());

if (mysqli_num_rows($result)>0)
{
    while ($record = mysqli_fetch_array($result,MYSQLI_BOTH)) {
        $name = $record['name']

        ?>
                <div class="card-deck text-center" style="width: 500px; float: left;">
                    <div class="card">
                        <img src="images/beer_category.jpg" class="card-img-top" alt="beer_category">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $name  ?></h5>
                            <button class="btn btn-infobtn sunny-morning-gradient my-4">
                                <?php echo "<a class='reg' href=\"products.php?id_category=$record[id_category]\">$record[name]</a><br />"; ?>
                            </button>
                        </div>
                    </div>
                </div>
<!--                <button class="btn btn-infobtn sunny-morning-gradient my-4">-->
<!--                    --><?php //echo "<a class='reg' href=\"products.php?id_category=$record[id_category]\">$record[name]</a><br />"; ?>
<!--                </button>-->
    <?php

    }
}
?>

            </div>
        </div>
    </div>
</div>



