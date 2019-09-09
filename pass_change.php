<?php
ob_start();
include 'core/init.php';
include 'includes/header.php';
include 'includes/navigation.php';

$msg = '';
$user = new User();

if(!$user->isLoggedIn()){
    Redirect::to('blog_post.php');
}
if(Input::exists()){
    if(Token::check(Input::get('token'))){
        $validate = new Validate();
        $validation = $validate->check($_POST,array(
            'password_current' => array(
                'required' => true,
                'min' => 6
            ),
            'new_password' => array(
                'requiired' => true,
                'min' => 6
            ),
            'new_password_again' => array(
                'required' => true,
                'min' => 6,
                'matches' => 'new_password'
            )
        ));
        if($validation->passed()){
            if(Hash::make(Input::get('password_current'), $user->data()->salt) !== $user->data()->password){
                echo 'Your current password is wrong';
            }else{
                $salt = Hash::salt(32);
                $user->update(array(
                    'password' => Hash::make(Input::get('new_password'), $salt),
                    'salt' => $salt
                ));

                $msg = '<div class="alert alert-success" role="alert">
                      <h4 class="alert-heading">Uspešno si promenio lozinku! </h4>
                      
                  
                    </div>';
            }
        }else{
            foreach ($validation->errors() as $error){
                echo $error, '<br />';
            }
        }
    }
}
?>


<div class="container ">
    <div class="row" style="padding-top: 30px; ">
        <div class="col-12 jumbotron jumbotron-fluid">
            <div class="container col-4">
                <h4 class="display-4">Podešavanja</h4>
                <?php echo $msg; ?>
                <form action="" method="post">

                    <div class="md-form">
                        <input name="password_current" type="password" id="form1" class="form-control" >
                        <label for="form1">Stara Lozinka</label>
                    </div>


                    <div class="md-form">
                        <input name="new_password" type="password" id="form1" class="form-control" >
                        <label for="form1">Nova Lozinka</label>
                    </div>


                    <div class="md-form">
                        <input name="new_password_again" type="password" id="form1" class="form-control" >
                        <label for="form1">Potvrdi Novu Lozinku</label>
                    </div>




                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    <input type="submit" class="btn-lg btn-outline-warning waves-effect" value="Promeni lozinku"/>



                </form>

            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>