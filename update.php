<?php
ob_start();
include 'core/init.php';
include 'includes/header.php';
include 'includes/navigation.php';

$user = new User();
$msg = '';
if(!$user->isLoggedIn()){

   Redirect::to('blog_post.php');
}
if(Input::exists()){
    if(Token::check(Input::get('token'))){

        $validate = new Validate();
        $validation = $validate->check($_POST,array(
            'firstname' => array(
                'required' => true,
                'min' => 2,
                'max' => 50
            ),
            'lastname' => array(
            'min' => 2,
            'max' => 50
            ),
            'username' => array(
            'min' => 2,
            'max' => 50
            ),
            'email' => array(
                'min' => 2,
            )

        ));

        if($validation->passed()){
            try{
                $user->update(array(
                    'firstname' => Input::get('firstname'),
                    'lastname' => Input::get('lastname'),
                    'username' => Input::get('username'),
                    'email' => Input::get('email')


                ));
                $msg =   '<div class="alert alert-success" role="alert" style="text-align: center">
                          <h4 class="alert-heading"><i class="fa fa-check" aria-hidden="true"></i> Podaci su promenjeni </h4>
                          <p>Osvežite stranicu.</p>
                         
                          </div>';
          //Session::flash('home');

                Redirect::to('update.php');
                ob_end_flush();



            }catch (Exception $e){
                die($e->getMessage());
            }
        }else{
            foreach ($validation->errors() as $error){
                echo $error. '<br />';
            }
        }
    }
}

?>

<div class="container ">
    <div class="row" style="padding-top: 30px; ">
        <div class="col-12 jumbotron jumbotron-fluid">
            <div class="container col-4">

                <?php echo '<br />'.$msg; ?>
                <form action="" method="post">
                    <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-12">
                                <h4 class="">Podešavanja</h4>
                                <div class="md-form">
                                    <input name="firstname" type="text" id="form1" class="form-control" value="<?php echo escape($user->data()->firstname) ?>">
                                    <label for="form1">Ime</label>
                                </div>
                            </div>

                            <div class="col-md-6  col-lg-12">
                                <div class="md-form">
                                    <input name="lastname" type="text" id="form1" class="form-control" value="<?php echo escape($user->data()->lastname) ?>">
                                    <label for="form1">Prezime</label>
                                </div>
                            </div>

                            <div class="col-md-6  col-lg-12">
                                <div class="md-form">
                                    <input name="username" type="text" id="form1" class="form-control" value="<?php echo escape($user->data()->username) ?>">
                                    <label for="form1">Korisničko ime</label>
                                </div>
                            </div>

                            <div class="col-md-6  col-lg-12">
                                <div class="md-form">
                                    <input name="email" type="text" id="form1" class="form-control" value="<?php echo escape($user->data()->email) ?>">
                                    <label for="form1">E adresa</label>
                                </div>
                            </div>


                            <div class="col-md-4  col-lg-12">
                                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                                <input type="submit" class="btn-lg btn-outline-warning waves-effect" value="Promeni podatke"/>
                            </div>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>