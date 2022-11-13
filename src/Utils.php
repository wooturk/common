<?php
$utils = [
	'Brand',
	'User',
];
foreach($utils as $util){
	if(is_file(__DIR__ . "/$util/Util.$util.php" )){
		include_once(__DIR__ . "/$util/Util.$util.php" );
	}
}
