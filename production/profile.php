<?php
include("../controllers/website_controller.php");
$lstWeb=new website_controller();
$showLstWeb=$lstWeb->Hien_thi_dsWeb()["lstWeb"];
$showLstWeb_TheoUser=$lstWeb->Hien_thi_dsWeb()["lstWeb_User"];
if(isset($_SESSION['name']))
{
  include('../controllers/account_controller.php');
  $user= new account_controller();
  if(isset($_POST['btnUpdateProfile']))
  {
    $username=$_SESSION['name'];
    $name=$_POST['txtfullname'];
    $email=$_POST['txtmail'];
    $user->UpdateTaiKhoan($username,$name,$email);
  }
}

?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Web tin tuc </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>
                <?php if(isset($_SESSION['name'])){
                      ?>
                      <?=$_SESSION['name']?>
                      <?php
                    }
                    ?>
                </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Main Navigation</h3>
                <hr/>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home </a>
                    
                  </li>
                  
                  <li><a><i class="fa fa-table"></i> Your Website <span class="fa fa-chevron-down"></a>
                    <ul class="nav child_menu">
                    <?php
                    if(is_array($showLstWeb_TheoUser))
                    {
                        foreach ($showLstWeb_TheoUser as $show) {
                          ?>
                          <li><a href="news.php?webid=<?=$show->id?>"><?=$show->WebName?></a></li>
                    <?php
                          }
                    }
                      ?>
                    </ul>
                  </li>
                  
                </ul>
              </div>
              <hr/>
              <div class="menu_section">
                <h3>Categories</h3>
                <ul class="nav side-menu">
                  <li><a href="news2.php"><i class="fa fa-bug"></i> News </a>
                    
                  </li>
                  <li><a href="website.php"><i class="fa fa-windows"></i> Websites </a>
                    
                  </li>
                  <li><a href="profile.php"><i class="fa fa-sitemap"></i> Account </a>
                    
                  </li>                  
                  <li><a href="contact.php"><i class="fa fa-laptop"></i> Contact </a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Profiles">
                <span class=" glyphicon glyphicon-list-alt" aria-hidden="true"></span>
              </a>

              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="row">
              <div class="col-lg-4">
                  <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Unicor</span></a>
                  </div>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-8">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div><!-- /input-group -->
                </div><!-- /.col-lg-8 -->
              </div>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Account <small>Your profile</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3>
                      <?php
                      if(isset($_SESSION['name']))
                      {
                        echo $_SESSION['name'];
                      }
                      ?>
                      </h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
                        </li>

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-external-link user-profile-icon"></i>
                          <a href="http://www.kimlabs.com/profile/" target="_blank"><?php
                          if(isset($_SESSION['email']))
                          {
                            echo $_SESSION['email'];
                          }
                          ?>
                          </a>
                        </li>
                      </ul>

                      

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Update Profile</h2>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <br>
                            <form class="form-horizontal form-label-left" method="post">

                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Date</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                  <input  type="text" class="form-control" data-inputmask="'mask': '99/99/9999'">
                                  <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                </div>
                              </div>
                             
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Full Name</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                  <input name="txtfullname" type="text" class="form-control" data-inputmask="'mask': '99-999999'">
                                  <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Email</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                  <input name="txtmail" type="text" class="form-control" data-inputmask="'mask' : '****-****-****-****-****-***'">
                                  <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                </div>
                              </div>
                             
                              
                              <div class="ln_solid"></div>

                              <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                  <button type="submit" class="btn btn-primary">Cancel</button>
                                  <button name="btnUpdateProfile" type="submit" class="btn btn-success">Accept</button>
                                </div>
                              </div>

                            </form>
                        </div>
                      </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    
  </body>
</html>