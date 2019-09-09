<?php
require 'store/db_config.php';
require 'store/functions.php';



if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT * FROM product WHERE name LIKE ?";

    if($stmt = mysqli_prepare($connection, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);

        // Set parameters
        $param_term = $_REQUEST["term"] . '%';

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $id = $row['id_product'];
                    echo "<p><a href='cart.php?id_product=$id'><i class=\"fa fa-beer\"></i> " . $row["name"] . "</a></p>";
                }
            } else{
                echo "<p>Probaj opet</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error( $connection);
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

// close connection
mysqli_close($connection);
?>