<?php
include("../controllers/website_controller.php");
$lst=new website_controller();

if(isset($_REQUEST['newsid']))
{
  $chitietTin=$lst->getChitietTin()["tintuc"];
}
?>

<?php
foreach ($chitietTin as $show) {
  
  ?>
  <div class="inbox-body">
                          <div class="mail_heading row">
                           
                           
                            <div class="col-md-12">
                              <h4>
                              <?php

                             if(isset($show->Title)){
                               echo $show->Title;
                             }
                             
                             ?>
                              </h4>
                            </div>
                          </div>
                          <div class="sender-info">
                            <div class="row">
                              <div class="col-md-12">
                                <strong>Create Date</strong>
                                <span>
                                    <?php

                             if(isset($show->CreateDate)){
                               echo $show->CreateDate;
                             }
                             
                             ?>
                                </span>
                              
                                <a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
                              </div>
                              <p class="text-center">
                              <img style="width: 200px; height: 200px" class="text-center" src="<?php
                             if(isset($show->Picture) && $show->Picture!='null'){
                               echo $show->Picture;
                             }
                               ?>">
                               </p>
                            </div>
                          </div>
                          <div class="view-mail">
                            <p>
                            
                            <?php

                             if(isset($show->Content) && $show->Content == "null"){
                               echo $show->Description;
                             }
                             else{
                               echo $show->Content;
                             }
                             ?>
                            </p>
                            <p class="text-center"><a href="<?php 
                            if(isset($show->Link)){
                               echo $show->Link;
                             }
                             ?>" class="btn btn-primary" target="_blank"> Visit Website</a></p>
                          </div>
                          
                          
                        </div>
    
  <?php
}
?>
              
    