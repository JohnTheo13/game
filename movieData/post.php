<?php
/*require_once('config.inc.php'); 

mysql_query("SET NAMES 'utf8'");

mysql_query("INSERT INTO movies(title,director,actors,Description,ranking,greekTitle,imageUrl)
		VALUES('".$_POST["title"]."','".$_POST["director"]."',
		'".$_POST["actors"]."','".$_POST["Description"]."',
		'".$_POST["ranking"]."','".$_POST["greekTitle"]."','".$_POST["imageUrl"]."')");

mysql_close($con); 

    class movie{
    public $Title;
    public $Director;
	public $Poster;
	public $Description;
	public $Actors;
	public $rank;
    public $imdbID;
}*/
$request = file_get_contents('php://input');
$entityBody = json_decode($request);
$source = file_get_contents('./data/movieData.json');

$sourceArray=json_decode($source);
$len=count($sourceArray);
$count=0;
/*
        $params = new movie();
        $params->Title=$entityBody->Title;
        $params->Director=$entityBody->Director;
		$params->Poster=$entityBody->Poster;
		$params->Plot=$entityBody->Plot;
		$params->Actors=$entityBody->Actors;
		$params->rank=1;
        $params->imdbID=$len;*/


if ($len) {
    echo $len;
        for ($i=0;$i<$len;$i++) {
            if ($sourceArray[$i]->Title===$entityBody->Title){
                echo " movie exists";
                $count++;
                break;
            } 
        } 
        if($count===0 && ($entityBody->Title!=null || $entityBody->Title!="")){
       array_push( $sourceArray, $entityBody );
                      echo "movie successfully saved"; }
}else{
    echo "nolen";
}

$jsonData = json_encode($sourceArray,JSON_PRETTY_PRINT);
file_put_contents('data/movieData.json',$jsonData);


?>