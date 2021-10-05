<?php
include("session/session.php");
?>
<!-- <link rel="icon" href="LogoMakerCa-1629816030209.PNG"> -->
<nav class="navbar navbar-expand-md navbar-light blue fixed-top">
        <button id="sidebarCollapse" class="btn navbar-btn">
      <i class="fas fa-lg fa-bars"></i>
    </button>
        <a class="navbar-brand ml-2" href="#">
            <img src="LogoMakerCa-1629816030209.png" style="height: 50px;width:50px;border-radius:50px;" id="img1">
            <h5 id="logo">Chef-Recipes</h5>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" id="link" href="logout.php">
                        <i class="fas fa-sign-out-alt"></i> LogOut
                        <span class="sr-only">(current) </span></a>
                </li>
                
                   
              
            </ul>
        </div>
    </nav>
<div class="float-left"></div>
    <div class="wrapper fixed-left">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4><i class="fas fa-user"></i>
                    <?php echo $_SESSION['admin']?>
                </h4>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="admindash.php"><i class="fas fa-home"></i>Home</a>
                </li>
                <li>
                    <a href="admindash.php"><i class="fas fa-clipboard"></i>Dashboard</a>
                </li>
                <li>
                    <a href="chef.php"><i class="fas fa-user-cog"></i>Chef</a>
                </li>
                <li>
                    <a href="add.php"><i class="fas fa-hands-helping"></i>Categories</a>
                </li>
                <li>
                    <a href="feedback.php"><i class="fas fa-info"></i>Feedback</a>
                </li>
              
            </ul>
        </nav>
       
    <!-- <div id="content">
          </div> -->
    <!-- </div>

    </div> -->
