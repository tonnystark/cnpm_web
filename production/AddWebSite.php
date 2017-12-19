<?php
/**
 * Created by PhpStorm.
 * User: MUNI
 * Date: 12/18/2017
 * Time: 11:08 AM
 */
include("../controllers/website_controller.php");
$website_ctr = new website_controller();
$webId = $_REQUEST["webId"];
$userid = $_SESSION["userid"];

if($website_ctr->ThemWebsite($webId ,$userid))
    echo 'true';
else
    echo 'false';