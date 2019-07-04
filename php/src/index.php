<?php 
header("Access-Control-Allow-Origin: *");//允许所有地址跨域请求
use \Psr\Http\Message\ServerRequestInterface as Request;  
use \Psr\Http\Message\ResponseInterface as Response;  
  
require '../vendor/autoload.php';  
require(dirname(__FILE__) . '/redis/redis_helper.php');
require(dirname(__FILE__) . '/utils/http.php');

$app = new Slim\App();  
//slim application routes  
$app->get('/', function ($request, $response, $args) {  
	$messages_count = count_messages();
	$data = get_messages(0, $messages_count);
	$http_response = new HttpResponse($data);
	$new_response = $response->withJson($http_response->toArray());
	return $new_response;  
}); 
$app->put('/', function ($request, $response, $args) {  
	$parsed_body = $request->getParsedBody();
	add_message($parsed_body['time'], $parsed_body['author'], $parsed_body['content']);
	$new_response = $response->withJson((new HttpResponse(null))->toArray());
	return $new_response;  
}); 


$app->run(); 
