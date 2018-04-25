
<!--header-->
<div class="header">
    <div class="container">
        <div class="head">
            <div class="logo">
                <a href="index.php?Page=Home"><img src="img/dribbble.png" alt=""></a> 
            </div>
        </div>
    </div>
    <div class="container">    
      <div class="head-top"> 
        <div class="col-sm-12">
            <nav class="navbar nav_bottom" role="navigation">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header nav_2">
                  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
              </div> 

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                  <ul class="nav navbar-nav nav_1">
                      <li><a class="color" href="?Page=Home">Home</a></li>
                      <li><a class="color3" href="?Page=Detail">Customize Shirt</a></li>
                      <li>
                          <a href="?Page=Orderdetaildisplay">Order</a>
                      </li>
                      <li>
                              <?php session_start(); ?>
                              <a href="<?php if(!isset($_SESSION['name'])) echo '?Page=Login'; ?>" class="color2"> <i class="fas fa-user"></i>
                                <?php 
                                  if (isset($_SESSION['name'])) {
                                    echo $_SESSION['name'];
                                  } else
                                  { echo "Login";}
                                ?>
                              </a>
                      </li>
                      <?php 
                        if (isset($_SESSION['name'])) {
                            echo '
                                <li>
                                    <a href="?Page=Logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
                                </li>
                            ';
                        } else {
                            echo '
                                <li><a href="?Page=Signup"><i class="fas fa-sign-in-alt"></i> Signup</a></li>
                            ';
                        }
                       ?>
                  </ul>
              </div>
            </nav>
        </div> 
    </div>  
</div>