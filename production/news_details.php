<?php
include("../controllers/website_controller.php");
$lstWeb=new website_controller();
$showLstWeb=$lstWeb->Hien_thi_dsWeb()["lstWeb"];
$showLstWeb_TheoUser=$lstWeb->Hien_thi_dsWeb()["lstWeb_User"];

$showAllComment=$lstWeb->Hien_thi_dsComment()["lstComment"];
if(isset($_GET['newsid']))
{
  $chitietTin=$lstWeb->getChitietTin()["tintuc"];
}
if(isset($_POST['btnLike']))
{
  $userid=$_SESSION['userid'];
  $newsid=$_GET['newsid'];
  $like=$lstWeb->LikeNews($newsid,$userid);
}
if(isset($_POST['btnAddComment']))
{
  if(isset($_SESSION['userid'])&& isset($_GET['newsid'])&& isset($_POST['txtcomment'])&& $_POST['txtcomment']!="")
  {
      $userid=$_SESSION['userid'];
      $content=$_POST['txtcomment'];
      $newsid=$_GET['newsid'];
      $Postdate=date('Y/m/d');
      $comment=$lstWeb->Them_Comment($newsid,$content,$Postdate,$userid);
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
            <?php
            foreach ($chitietTin as $show) {
              
              ?>
              <div class="col-sm-12 mail_view">
                        <div class="inbox-body">
                          <div class="mail_heading row">
                            
                            <div class="col-md-4 text-left">
                              
                              <p class="date"><?php

                             if(isset($show->CreateDate)){
                               echo $show->CreateDate;
                             }
                             
                             ?></p>
                              
                            </div>
                            
                            
                            <div class="col-md-12">
                              <h4> <?php

                             if(isset($show->Title)){
                               echo $show->Title;
                             }
                             
                             ?></h4>

                            </div>
                          </div>
                          <div class="sender-info">
                            <div class="row">
                              <div class="col-md-12">
                                <strong><?php

                             if(isset($show->Author)){
                               echo $show->Author;
                             }
                             
                             ?></strong>
                               
                        
                                 
                              </div>
                              <div class="col-md-12">
                                <p class="text-center" > <img style="width: 500px;height: 300px" src="<?php if(isset($show->Picture) && $show->Picture!='null'){
                               echo $show->Picture;
                             }
                               ?>"></p>
                        
                                 
                              </div>
                            </div>
                          </div>
                          <div class="view-mail">
                            <p> <?php

                             if(isset($show->Content) && $show->Content == "null"){
                               echo $show->Description;
                             }
                             else{
                               echo $show->Content;
                             }
                             ?></p>
                          </div>
                          
                          
                        </div>

                      </div>
             <?php
              }
              ?>
                  <div class="col-sm-12">
                    <form id="demo-form" method="POST" data-parsley-validate="" novalidate="">
                        <p>
                            <label for="message">Message (20 chars min, 100 max) :</label>
                            <textarea id="message" required="required" class="form-control" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10" name="txtcomment"></textarea>

                            
                            <div class="btn-group">
                                <button class="btn btn-primary" type="submit" name="btnAddComment">Comment</Button>
                              </div>
                        </p>
                      </form>
                       <form action="" method="post" accept-charset="utf-8">
                          <button type="submit" class="btn btn-default" name="btnLike"><i class="fa fa-facebook"></i> Like</button>
                      </form>
                  </div>
                  <div class="col-sm-12 mail_list_column">
                   <?php
                          foreach ($showAllComment as $show) {
                            ?>
                             <a href="#">
                              <div class="mail_list">
                                <div class="left">
                                  <i class="fa fa-star"></i>
                                </div>
                                <div class="right">

                                  <h3><?=$show->Username?> <small><?=$show->Postdate?></small></h3>
                                  <p> <?=$show->Content?></p>
                                </div>
                              </div>
                            </a>
                            <?php
                           } 
                           ?>
                        
                        
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