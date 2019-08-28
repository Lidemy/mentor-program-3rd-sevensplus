<?php
require_once('./utils.php');
$method = $_SERVER['REQUEST_METHOD'];
isset(explode("lists/",$_SERVER['REQUEST_URI'])[1])?$partID = explode('lists/',$_SERVER['REQUEST_URI'])[1] : $partID = null;
$utils = new utilsFunction;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS, PATCH, DELETE');
header('Access-Control-Allow-Headers": "Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Access-Control-Allow-Credentials: true');

if($method == 'GET'){
	if (empty($partID)){
		$utils->readAllData();
	} else {
		$utils->readOneList($partID);
	}
} else if ($method == 'POST') {
	$todo = json_decode(file_get_contents('php://input'))->text;
	if (empty($todo)) return;
	$utils->create($todo);
} else if ($method == 'DELETE'){
	if (empty($partID)){
		http_response_code(404);
		return;
	};
	$utils->delete($partID);
} else if($method == 'PATCH') {
	if (empty($partID)){
		http_response_code(404);
		return;
	};
	$item = json_decode(file_get_contents("php://input"))->type;
	$utils->edit($partID,$item);
}
?>