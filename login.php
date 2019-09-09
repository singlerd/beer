<?php
require "includes/header.php";
require_once 'core/init.php';
$user = new User();
$msg= '';




if(Input::exists()){
    if(Token::check(Input::get('token'))){
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
                'email'=>array('required'=>  true),
                'password'=>array('required' => true)
        ));
        if($validation->passed()){
            //$user = new User();


            $remember = (Input::get('remember') === 'on' ) ? true : false;
            $login = $user->login(escape(Input::get('email')), escape(Input::get('password')), $remember  );

            if($login){
                Redirect::to('blog_post.php');
            }else{
                $msg =  '<div class="alert alert-danger" role="alert">
                          <h4 class="alert-heading">Neuspešna prijava</h4>
                          <p>Email i lozinka se ne slažu!</p>
                         
                        </div>';
            }
        }else{
            foreach ($validation->errors() as $error){
                echo $error. '<br />';


            }
        }

    }
}


if($user->isLoggedIn()){
    Redirect::to('blog_post.php');
}
?>
<!-- Default form login -->
<div class="container">
    <div class="row">
        <div class=" col-lg-6 col-xl-6 p-3">
            <form action="" method="post" class="text-center border border-light p-5">
                <div class="row">
                    <div class="col-md-6  col-lg-12">
                    <p class="h4 mb-4">Prijavite se</p>
                    <?php echo $msg;?>
                    </div>

                    <div class="col-md-6  col-lg-12">
                        <div class="form-row ">
                            <div class="col">
                                <!--Email -->
                                <div class="md-form">
                                    <input type="text" name="email" id="materialRegisterFormEmail" class="form-control">
                                    <label for="materialRegisterFormEmail">E-adresa</label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6  col-lg-12">
                        <div class="form-row mb-4">
                            <div class="col">
                                <!--Password -->
                                <div class="md-form">
                                    <input type="password" name="password" id="materialRegisterFormPassword" class="form-control">
                                    <label for="materialRegisterFormPassword">Lozinka</label>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="col-md-6  col-lg-12">
                        <div class="d-flex justify-content-around">
                            <div>
                                <!-- Remember me -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" id="defaultLoginFormRemember">
                                    <label class="custom-control-label" for="defaultLoginFormRemember">Zapamti me</label>
                                </div>
                            </div>


                            <div>
                                <!-- Forgot password -->
                                <a href="#" class="colorBeer">Zaboravljena lozinka?</a>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6  col-lg-12">
                    <!--Token input-->
                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

                    <!-- Sign in button -->
                    <button class="btn btn-info btn-block btn sunny-morning-gradient my-4" type="submit">Prijavi se</button>



                    <hr>
                    <!-- Register -->
                    <p>Nisi član?
                        <a href="register.php" class="colorBeer" ">Napravi svoj nalog</a>
                    </p>
                    </div>
                </div>
            </form>
        </div>


        <div class="col-lg-6 col-xl-6 p-3 text-center">
            <img class="img-fluid" width="550" src="vendor/img/baner.png" alt="baner">
            <h4 class="p-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque eos quam repellat. Aliquam corporis doloribus eligendi fugit minima mollitia perferendis!</h4>

        </div>
    </div>
</div>
<!-- Default form login -->

<?php
include 'includes/footer.php';
?>