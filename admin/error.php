<?php
function messageLocation($get_message){
    $message = $_GET["messageLocation"];
    switch($message){
        case 1: ?>
                <div class="alert alert-info alert-dismissible fade show animated fadeInRight" role="alert">
                    Location updated successfuly.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                break;
        case 2: ?>
                <div class="alert alert-success alert-dismissible fade show animated fadeInRight" role="alert">
                    Location inserted successfuly.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                break;
        case 3: ?>
                <div class="alert alert-danger alert-dismissible fade show animated fadeInLeft" role="alert">
                    Image type error, image must be JPEG, PNG or GIF!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                break;
        case 4: ?>
                <div class="alert alert-info alert-dismissible fade show animated fadeInRight" role="alert">
                    Image updated successfuly.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                break;
    }
}
 
function messageBeer($get_message){
    $message = $_GET["messageBeer"];
    switch($message){
        case 1: ?>
                <div class="alert alert-info alert-dismissible fade show animated fadeInRight" role="alert">
                    Beer updated successfuly.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                break;
        case 2: ?>
                <div class="alert alert-success alert-dismissible fade show animated fadeInRight" role="alert">
                    Beer inserted successfuly.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                break;
        case 3: ?>
                <div class="alert alert-danger alert-dismissible fade show animated fadeInLeft" role="alert">
                    Image type error, image must be JPEG, PNG or GIF!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                break;
        case 4: ?>
                <div class="alert alert-info alert-dismissible fade show animated fadeInRight" role="alert">
                    Beer updated successfuly.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                break;
    }
}
