<?php
require_once 'core/init.php';
$user = new User();
$data = $user->data();
$detect = new Mobile();

?>

<!-- Jumbotron -->

<div class="card card-image">
    <div class="text-white text-center py-5" >


        <div class="container py-5" >
            <?php
            if($user->isLoggedIn()){
                if ($user->hasPermission('admin')){ ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Pozdrav <strong><?php echo escape($data->username); ?></strong>, Prijavio si se kao administrator !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <?php } }?>

            <?php
                //include 'here_maps_content.php';
            ?>


        </div>


    </div>
</div>
<!-- Jumbotron -->
