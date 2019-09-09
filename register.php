<?php
require "includes/header.php";
require_once 'core/init.php';




$msg = '';
$user = new User();
if(Input::exists()){
    if(Token::check(Input::get('token'))){
        $validate = new Validate();
        $validation = $validate->check($_POST,array(
            'first_name' => array(
                'required' => true,
                'min' => 2,
                'max' => 50,
            ),
            'last_name' => array(
                'required' => true,
                'min' => 2,
                'max' => 50
            ),
            'username' => array(
                'required' => true,
                'min' => 2,
                'max' => 20,
                'unique' => 'users'
            ),
            'password' => array(
                'required' => true,
                'min' => 6
            ),
            'password_again' => array(
                'required' => true,
                'matches' => 'password'
            ),
            'email' => array(
                'required' => true
            )
        ));

        if($validation->passed()){

            $salt = Hash::salt();
            $newPass = Hash::make(Input::get('password'), $salt);


            try{



                $user->create(array(
                    'firstname' => Input::get('first_name'),
                    'lastname' => Input::get('last_name'),
                    'username' => Input::get('username'),
                    'password' => $newPass,
                    'email' => Input::get('email'),
                    'salt' => $salt,
                    'joined' => date('Y-m-d H:i:s'),
                    'group' => 1


                ));





                $msg = '<div class="alert alert-success" role="alert">
                          <h4 class="alert-heading">Registracija je uspešna</h4>
                          <p>Možes se <a href="login.php">prijaviti</a></p>
                        </div>';

            }catch (Exception $e){
                die($e->getMessage());

            }
        }else{
            print_r($validation->errors());

        }
    }
}

if($user->isLoggedIn()){
    Redirect::to('blog_post.php');
}


?>
<div class="container">
    <div class="row">
        <div class="col-lg-6 div-xl-6 p-3">
            <!-- Default form register -->
            <form action="" method="post" class="text-center border border-light p-5" >
                <div class="row">
                    <div class="col-md-6  col-lg-12">
                        <?php echo $msg;?>
                        <p class="h4 mb-4">Napravite nalog</p>

                        <div class="form-row">
                            <div class="col">
                                <!-- First name -->
                                <div class="md-form">
                                    <input type="text" name="first_name" id="materialRegisterFormFirstName" class="form-control">
                                    <label for="materialRegisterFormFirstName">Ime</label>
                                </div>
                            </div>

                            <div class="col">
                                <!-- Last name -->
                                <div class="md-form">
                                    <input type="text" name="last_name" id="materialRegisterFormFirstName" class="form-control">
                                    <label for="materialRegisterFormLastName">Prezime</label>
                                </div>
                            </div>

                        </div>

                        <div class="form-row mb-4">
                            <div class="col">
                                <!--Username -->
                                <div class="md-form">
                                    <input type="text" name="username" id="materialRegisterFormFirstName" class="form-control">
                                    <label for="materialRegisterFormUsername">Korisničko ime</label>
                                </div>
                            </div>

                        </div>

                        <div class="form-row mb-4">
                            <div class="col">
                                <!--Password-->
                                <div class="md-form">
                                    <input type="password" name="password" id="materialRegisterFormFirstName" class="form-control">
                                    <label for="materialRegisterFormPassword">Lozinka</label>
                                </div>
                            </div>

                        </div>

                        <div class="form-row mb-4">
                            <div class="col">
                                <!--Password again-->
                                <div class="md-form">
                                    <input type="password" name="password_again" id="materialRegisterFormFirstName" class="form-control">
                                    <label for="materialRegisterFormPasswordAgain">Lozinka opet</label>
                                </div>
                            </div>



                        </div>

                        <div class="form-row mb-4">
                            <div class="col">
                                <!--Email-->
                                <div class="md-form">
                                    <input type="text" name="email" id="materialRegisterFormFirstName" class="form-control">
                                    <label for="materialRegisterFormEmail">E-adresa</label>
                                </div>
                            </div>

                        </div>



                        <!--Input for token-->
                        <input name="token" type="hidden" value="<?php echo Token::generate(); ?>">
                        <!--This token is for submiting, every time you refresh a page Token::generate() is generating a new token view in page source-->
                        <!-- Sign up button -->
                        <button class="btn btn-info my-4 btn-block sunny-morning-gradient " type="submit" name="submit">Registrujte se</button>




                        <hr>
                        <p class="mb-5">Već si član?
                            <a href="login.php" class="colorBeer">Prijavi se </a>
                        </p>

                        <!-- Terms of service -->
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-6 col-xl-6 p-3 text-center">
            <img class="img-fluid" width="550" src="vendor/img/baner.png" alt="baner">

            <h4 class="p-3 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi at cumque dolore est illo maiores mollitia necessitatibus nulla, officia sunt tenetur! Animi, atque commodi expedita iure nemo qui sequi.</h4>
        </div>
    </div>
</div>
    <!-- Default form register -->
<?php
require "includes/footer.php";
?>