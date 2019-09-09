<?php

include_once '../store/db_config.php';
?>


<?php
    require_once ('nbbc/nbbc.php');
    $sql = "SELECT * FROM blog ORDER BY id DESC";
    $res = mysqli_query($connection, $sql);

    $bbcode = new BBCode;
    $posts = "";

    if(mysqli_num_rows($res) > 0)
    {
        while ($row = mysqli_fetch_assoc($res))
        {
            $id = $row['id'];
            $title = $row['title'];
            $content = $row['content'];
            $date = $row['date'];

            $admin = "";

            $output = $bbcode->Parse($content);
        }
    }
?>
