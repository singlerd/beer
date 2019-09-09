<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 11/18/2018
 * Time: 21:09
 */

require_once 'core/init.php';

$user = new User();
//Redirect::to('blog_post.php');

if(!$user->exists()){
    Redirect::to(404);
}else{
    $data = $user->data();
}
include 'includes/header.php';
include  'includes/navigation.php';
include 'includes/profile_navigation.php';
require 'store/functions.php';
require 'store/db_config.php';

$user_id = $_SESSION['user'];

?>

    <div class="container pt-3">
        <div class="row pb-5">
            <div class="col-12 col-lg-12 ">
                <div class="row">
                    <div class="col-lg-4 col-xl-4">
                        <div class="container pb-5">
                            <div class="card animated fadeInDown">
                                <div class="card-header border border-dark">
                                    <h6>Ime</h6>
                                    <h3><?php echo $data->firstname.' '.$data->lastname; ?></h3>
                                    <h6>Korisničko ime</h6>
                                    <h3><?php echo $data->username ?></h3>
                                </div>
                                <div class="card-body">
                                    <div class="avatar mx-auto white">
                                        <img src="images/profile/<?php echo get_profile_image($user_id); ?>" name="image" alt="avatar mx-auto white" class="rounded-circle img-fluid">


                                        <div class="text-center">
                                            <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">Promeni sliku</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-8 col-xl-8">

                            <div class="container ">
                                <div class="card animated fadeInDown">
                                    <div class="card-header">
                                        <h2>Dešavanja</h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="border p-3">
                                            <h5 class="card-title"><i class="fa fa-thumb-tack"></i> Novosadski Oktoberfest 2019 </h5>
                                            <h6><i class="fa fa-calendar-check-o"></i> 18. i 19. oktobar</h6>
                                            <a href="https://www.facebook.com/events/2044974438952723/"><i class="fa fa-facebook"></i> Događaj</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>

                <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">Profilna slika</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="img_upload.php" method="post" name="upload" enctype="multipart/form-data">
                                <div class="modal-body mx-3">
                                    <div class="md-form mb-5">
                                        <input type="file" name="file" id="defaultForm-email" class="form-control validate">
                                    </div>


                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <input class="btn btn-default" type="submit" name="sb" id="sb" value="PROMENI">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
<?php include 'includes/footer.php'; ?>