<?php
include_once("../lib/database.php");
//table website
class website_model extends db
{
	
	function DSWebsite($UserId)
	{
		//$sql="select * from website where UserId=0";
        $sql="SELECT * from website
              WHERE id NOT IN (SELECT webId from user_website where userId = '$UserId')";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	function DSWebsite_TheoUserID($UserId)
	{
		//$sql="select * from website where UserId=$UserId";
		$sql="SELECT * from website
              WHERE id IN (SELECT webId from user_website where userId = '$UserId')";

		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	
	function DSNews()
	{
	
		$sql="select * from news";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	function getCate()
	{
		$sql="select * from category";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	function Hien_thi_dsCate($WebId)
	{
		$sql="select * from category where WebId=$WebId";
		$this->setQuery($sql);
		return $this->loadAllRows(array($WebId));
	}
	
	
	function Hien_thi_dsNews_TheoCate($CateId)
	{
		$sql="select * from news where CateId=$CateId";
		$this->setQuery($sql);
		return $this->loadAllRows(array($CateId));
	}
	function Like($newsid,$userid)
	{
		$sql="insert into userliked(idnews,iduser) values(?,?)";
		$this->setQuery($sql);
		$result=$this->execute(array($newsid,$userid));
		if($result)
		{
			return $this->getLastId();
		}
		else{
			return false;
		}
	}
	function AddComment($newsid,$content,$postdate,$userid)
	{

		$sql="insert into feedback(idNews,Content,Postdate,idUser) values(?,?,?,?)";
		$this->setQuery($sql);
		$result=$this->execute(array($newsid,$content,$postdate,$userid));
		if($result)
		{
			return $result->rowCount();
		}
		else{
			return false;
		}
	}
	function getComment($newsid)
	{
		$sql="select * from feedback,user where feedback.idUser=user.id and idNews=$newsid";
		$this->setQuery($sql);
		return $this->loadAllRows(array($newsid));
	}
	function Search($keyword)
	{

		$sql="select * from news where Title like '%$keyword%' or Description like '%$keyword%'";
		$this->setQuery($sql);
		return $this->loadAllRows(array($keyword));
	}
	function getTintucById($id_tin){
		$sql = "Select * from news where id = $id_tin";
		$this->setQuery($sql);
		return $this->loadAllRows(array($id_tin));
	}
    function ThemMoiWebsite($webId,$userid)
    {
        $sql = "INSERT INTO user_website(userId, webId, status)
            Select $userid, $webId, 1 FROM DUAL
            WHERE NOT EXISTS (SELECT * FROM user_website WHERE userId = '$userid' AND webId = $webId) LIMIT 1";
        $this->setQuery($sql);
        $result=$this->execute();
        if($result)
        {
            return $result->rowCount();
        }
        else{
            return false;
        }
    }

    function RemoveWebsite($webId,$userid)
    {
        $sql = "DELETE FROM user_website
                Where userId = '$userid' AND webId = '$webId'";
        $this->setQuery($sql);
        $result=$this->execute();
        if($result)
        {
            return $result->rowCount();
        }
        else{
            return false;
        }
    }

	function AddStatistic($Time,$Numvisit)
	{

		$sql="insert into statistic(Time,Numvisit) values(?,?)";
		$this->setQuery($sql);
		$result=$this->execute(array($Time,$Numvisit));
		if($result)
		{
			return $this->getLastId();
		}
		else{
			return false;
		}
	}

	
	
}

