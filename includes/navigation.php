<?php
require_once 'core/init.php';
require_once "classes/Mobile.php";

if(Session::exists('home')){
    echo '<p>' . Session::flash('home') . '</p>';
}

$user = new User();
$detect = new Mobile();

?>


<!--Main Navigation-->
    <header >
    <nav class="navbar  navbar-expand-lg navbar-dark scrolling-navbar sunny-morning-gradient">
        <div class="container">
            <a class="navbar-brand" href="index.php"><strong>Online Pivopije</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <?php if($user->isLoggedIn()){ ?>
                   <style type="text/css">



                   </style>

                        <div class="md-form my-0 pt-2 search-box">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                            <div class="result"></div>
                        </div>


                   <script type="text/javascript">
                       $(document).ready(function(){
                           $('.search-box input[type="text"]').on("keyup input", function(){
                               /* Get input value on change */
                               var inputVal = $(this).val();
                               var resultDropdown = $(this).siblings(".result");
                               if(inputVal.length){
                                   $.get("backend-search.php", {term: inputVal}).done(function(data){
                                       // Display the returned data in browser
                                       resultDropdown.html(data);
                                   });
                               } else{
                                   resultDropdown.empty();
                               }
                           });

                           // Set search input value on click of result item
                           $(document).on("click", ".result p", function(){
                               $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                               $(this).parent(".result").empty();
                           });
                       });
                   </script>

                <?php } ?>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Početna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="store.php">Prodavnica</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="interesting.php">Zanimljivosti</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="here_maps.php">Putevi piva</a>
                    </li>
                    <?php if(!$user->isLoggedIn()){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">O nama</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Kontakt</a>
                    </li>
                    <?php } ?>

                    <?php if(!$user->isLoggedIn()){ ?>
                    <li class="nav-item">
                        <a class="reg" href="login.php"> <button type="button" class="btn btn-sm btn-outline-warning waves-effect  grey lighten-5">Prijavi se</button></a>
                    </li>
                    <?php } ?>
                    <?php if($user->isLoggedIn()){ ?>
                        <?php if(!$detect -> isAndroidApp()) { ?>
                        <li class="nav-item">
                            <a class="nav-link"><span style="color: #fff; border-left:3px solid white"   ></span></a>
                        </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php?user=<?php echo escape($user->data()->username);  ?>"><i style=" font-size: 20px" class="fa fa-user" aria-hidden="true"></i><?php echo escape($user->data()->username);  ?></a>
                        </li>

                        <!-- Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false"><i style=" font-size: 20px" class=" fa fa-gear" aria-hidden="true"></i>Settings</a>
                            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="update.php">Promena podataka</a>
                                <a class="dropdown-item" href="pass_change.php">Promena lozinke</a>
                            </div>
                        </li>

                        <?php if($user -> hasPermission("admin")) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="admin.php">Admin</a>
                            </li>
                        <?php } ?>

                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Odjavi se</a>
                        </li>
                        
                  <?php } ?>
                 <?php if (isset($_SESSION['user'])) { ?>
                </ul>
                <ul class="navbar-nav nav-flex-icons">
                    <li class="nav-item">
                        <a href="cart_content.php" class="nav-link size20"><i class="fa fa-shopping-cart"></i></a>
                    </li>
                </ul>
                <?php } ?>




            </div>

        </div>

    </nav>

    </header>