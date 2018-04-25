<?php
	$inj = array ('select', 'insert', 'delete', 'update', 'drop table', 'union', 'null', 'SELECT', 'INSERT', 'DELETE', 'UPDATE', 'DROP TABLE', 'UNION', 'NULL','order by','order  by');
	for ($i = 0; $i < sizeof ($_GET); ++$i){
	for ($j = 0; $j < sizeof ($inj); ++$j){
	foreach($_GET as $gets){
	if(preg_match ('/' . $inj[$j] . '/', $gets)){
	$temp = key ($_GET);
	$_GET[$temp] = '';
	exit('<iframe title="YouTube video player" width="800" height="600" src="http://www.youtube.com/embed/bzen6iORGIk" frameborder="0" allowfullscreen></iframe>');
    continue;
    }
    }
    }
}


@define(page,"includes/");


include .'config.php';
include "./functions/general_functions.php";

include page.'head.php';
include page.'header.php';


if ($_GET["Page"]) { 
	$link=$_GET["Page"]; 
} else { 
	$link="Home"; 
}
include ($link.'.php');


include page.'footer.php';
?>
