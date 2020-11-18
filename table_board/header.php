<?php
    session_start();
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Awesome People</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">

        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/responsive.css">
        
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Russo+One&display=swap" rel="stylesheet">
    </head>
    <body>
        
        <div class="wrapper">
            <!--========================= header menu ============================= -->
            <div class="header">
                <div class="header-menu">
                    <div class="header-text"><a href="index.php">Awesome People</a></div>
                    <div class="openbtn" onclick="toggleSidebar()">
                        <i class="fas fa-th-list"></i>
                    </div>
                    <ul>

                        <?php 
                        
                        
                            
                        
                            if(isset($_SESSION['userId'])){
                                echo '<p>You are logged in. Welcome!</p>';
                                echo '<li><a class="button" onclick="openLogin()" style="width:auto;">Log out</a></li>';
                                require_once 'logout.php';
                            } else{
                                echo '<li><a class="button" style="width:auto;" onclick="openLogin()">Log In</a></li>';
                                require_once 'login.php';
                                echo '<li><a class="button" style="width:auto;" onclick="openSignup()">Sign Up</a></li>';
                                require_once 'signup.php';
                            }
                        ?>
                        
                        <li><a href="#" class="dark-mode"><i class="fas fa-moon"></i></a></li>
                    </ul>
                </div>
            </div>
            <!--=================================== side bar ================================== -->
            <div class="sidebar" id="mySidebar">
                <div class="sidebar-menu">
                    <a href="javascript:void(0)" class="closebtn" onclick="toggleSidebar()">×</a>
                    <div class="profile">
                        <img src="./image/person.jpg" alt="">
                        <p>USER</p>
                    </div>
                    <ul>
                        <li class="item">
                            <a href="#" class="menu-btn">
                                <i class="fas fa-desktop"></i><span>Board</span>
                            </a>
                        </li>
                        <li class="item">
                            <a href="#sub-menu1" class="menu-btn" onclick="dropdown()">
                                <i class="fas fa-user"></i><span>Profile</span><i class="fas fa-chevron-down drop-down" id="down"></i>
                            </a>
                            <div class="sub-menu" id="sub-menu1">
                                <a href="#" onclick="openUploadImg()"><i class="fas fa-camera"></i><span>Photo</span></a>
                                    <div id="upload" class="upload">
                                        <div class="upload-content animate">
                                            <span><a class="close" onclick="closeUploadImg()">x</a></span>
                                            <div class="uploadContainer">
                                                <div class="imgcontainer">
                                                    <img class="uploadImg" src="" alt="">
                                                </div>
                                                <div class="content">
                                                    <div class="icon"><i class="fas fa-file-image"></i></div>
                                                    <div class="text">No file chosen yet.</div>
                                                </div>
                                                <div class="close uploadClose">x</div>
                                                <div class="file-name">File name here</div>
                                            </div>
                                            <div class="uploadBtn">
                                                <button onclick="chooseImg()" class="chooseImg">Choose a file</button>
                                                <input class="openFileBtn" type="file" hidden>
                                                <button class="uploadFinalBtn" type="submit">upload</button>
                                            </div>
                                        </div>
                                    </div>
                                <a href="#"><i class="fas fa-signature"></i><span>Name</span></a>
                            </div>
                        </li>
                        <li class="item">
                            <a href="#sub-menu2" class="menu-btn" onclick="dropdown()">
                                <i class="fas fa-envelope"></i><span>Message</span><i class="fas fa-chevron-down drop-down" id="down"></i>
                            </a>
                            <div class="sub-menu" id="sub-menu2">
                                <a href="#"><i class="fas fa-envelope-open"></i><span>New</span></a>
                                <a href="#"><i class="far fa-envelope-open"></i><span>Sent</span></a>
                                <a href="#"><i class="fas fa-exclamation-triangle"></i><span>Spam</span></a>
                            </div>
                        </li>
                        <li class="item">
                            <a href="#sub-menu3" class="menu-btn" onclick="dropdown()">
                                <i class="fas fa-cog"></i><span>Setting</span><i class="fas fa-chevron-down drop-down" id="down"></i>
                            </a>
                            <div class="sub-menu" id="sub-menu3">
                                <a href="#"><i class="fas fa-lock"></i><span>Password</span></a>
                                <a href="#"><i class="fas fa-globe-asia"></i><span>Language</span></a>
                            </div>
                        </li>
                        <li class="item">
                            <a href="#" class="menu-btn">
                                <i class="fas fa-exclamation-circle"></i></i><span>About</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            