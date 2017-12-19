<?php
include("../controllers/website_controller.php");
$lstWeb=new website_controller();
$showLstWeb=$lstWeb->Hien_thi_dsWeb()["lstWeb"];
$showLstWeb_TheoUser=$lstWeb->Hien_thi_dsWeb()["lstWeb_User"];


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
                    <a href="news2.html" class="site_title"><i class="fa fa-paw"></i> <span>Unicor</span></a>
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
                    <h2>Website<small>All</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Link</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      if(is_array($showLstWeb))
                      {
                        foreach ($showLstWeb as $show) {
                          
                          ?>
                          <tr>
                            <td><a href="news.php?webid=<?=$show->id?>" id='webid'><?=$show->id?></a></td>
                            <td><a href="news.php?webid=<?=$show->id?>" id='webname'><?=$show->WebName?></a></td>
                            <td><a href="news.php?webid=<?=$show->id?>"id= 'weburl'><?=$show->WebUrl?></a></td>
                            <td>
                                <button style="width: 30px" class="btnAddWeb" data-id="<?=$show->id?>"> <i class="fa fa-plus"></i></button>
                            </td>
                          </tr>
                        <?php
                         } 
                          
                       }
                        ?>
                      </tbody>
                    </table>
                      <div id="lblAlert" style="display: none">
                          <div class="alert alert-success alert-dismissable fade in">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>Success!</strong> Đăng ký thành công.
                          </div>
                      </div>
                      <div id="lblError" style="display: none">
                          <div class="alert alert-danger alert-dismissable fade in">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>Failure</strong> Đăng ký thất bại.
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
    <script>
        $(document).ready(function () {
            $('.btnAddWeb').click(function (e) {
                e.preventDefault();

                var webId = $(this).data('id');

                $.ajax({
                    url:'AddWebSite.php',
                    method:'post',
                    // dataType:'json',
                    data:{
                        webId: webId
                    },
                    success:function (result) {
                        if(result == "  true"){
                            $('#lblAlert').css("display", "block").fadeTo(2000, 500).slideUp(500, function(){
                                $("#lblAlert").slideUp(500);
                            });

                        }
                        else
                        {
                            $('#lblError').css("display", "block").fadeTo(2000, 500).slideUp(500, function(){
                                $("#lblError").slideUp(500);
                            });;
                        }

                    },
                    error:function (err) {
                        alert("Login thất bại");
                    }
                });

            });

        });
    </script>
    
  </body>
</html>