<?php
session_start();
include("../models/website_model.php");

class website_controller
{
    function Hien_thi_dsWeb()
    {
        if(isset($_SESSION['userid']))
        {
            $userid=$_SESSION['userid'];
            $w= new website_model();
            $list_web= $w->DSWebsite($userid);
            $list_web_user=$w->DSWebsite_TheoUserID($userid);
            return array('lstWeb' => $list_web,'lstWeb_User' => $list_web_user);
        }

    }

    function Hien_thi_dsCate()
    {
        $w= new website_model();
        if(isset($_GET['webid']))
        {

            $WebId=$_GET['webid'];
            $list_cate= $w->Hien_thi_dsCate($WebId);
        }
        else
        {
            $list_cate=$w->getCate();
        }

        return array('lstCate' => $list_cate);
    }

    function Hien_thi_dsNews()
    {
        $w= new website_model();
        $list_new= $w->DSNews();
        return array('lstallNews' => $list_new);
    }
    function Hien_thi_dsComment()
    {
        $w= new website_model();
        if(isset($_GET['newsid']))
        {
            $list_comment= $w->getComment($_GET['newsid']);
        }
        return array('lstComment' => $list_comment);
    }


    function Hien_thi_dsNews_TheoCate()
    {
        if(isset($_GET['CateId']))
        {

            $CateId=$_GET['CateId'];
        }
        else
        {
            $CateId=1;
        }

        $w= new website_model();
        $list_news= $w->Hien_thi_dsNews_TheoCate($CateId);
        return array('lstNews' => $list_news);
    }
    public function Them_Comment($newsid,$content,$Postdate,$userid)
    {

        $w= new website_model();
        $newsid=$_GET['newsid'];
        if($content!="")
        {
            try
            {
                $usercomment= $w->AddComment($newsid,$content,$Postdate,$userid);
                if($usercomment > 0){
                    echo "<script language='javascript'>alert('Thêm comment thành công');";
                    echo "location.href='news_details.php?newsid=$newsid';</script>";
                }
                else
                {
                    echo "<script language='javascript'>alert('Thêm comment thất bại');";
                    echo "location.href='news_details.php?newsid=$newsid';</script>";
                }


            }
            catch (Exception $e)
            {
                echo "<script language='javascript'>alert('Thêm comment thất bại ');";
                echo "location.href='news_details.php?newsid=$newsid';</script>";
            }


        }
        else{
            echo "<script language='javascript'>alert('Thêm thất bại')</script>";
        }

    }
    public function LikeNews($newsid,$userid)
    {
        $w= new website_model();
        try
        {
            $userlike= $w->Like($newsid,$userid);
            echo "<script language='javascript'>alert('Like thành công');</script>";
        }
        catch (Exception $e)
        {
            echo "<script language='javascript'>alert('Like thất bại')</script>";
        }

    }
    function getChitietTin(){
        $m_tintuc = new website_model();
        $id_tin = $_REQUEST['newsid'];
        $tin = $m_tintuc->getTintucById($id_tin);

        return array('tintuc'=>$tin);
    }
    function Search_news($key)
    {
        $w= new website_model();
        $search= $w->Search($key);

        return $search;
    }

    function ThemWebsite($webId,$userid)
    {
        $w= new website_model();
        $web= $w->ThemMoiWebsite($webId,$userid);
        if($web>0)
        {
            return true;
        }
        return false;
    }

    function RemoveWebsite($webId,$userid)
    {
        $w= new website_model();
        $web= $w->RemoveWebsite($webId,$userid);
        if($web>0)
        {
            return true;
        }
        return false;
    }
    function addStatistic($Time,$Numvisit)
    {
        $w= new website_model();
        $sta= $w->AddStatistic($Time,$Numvisit);
    }


}

?>