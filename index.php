<?php 

require_once("vendor/autoload.php");


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
//use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\DB\Connection;


//echo $_SERVER["DOCUMENT_ROOT"];

//$app = new Slim();

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$configuration = new \Slim\Container($configuration);

$app = new \Slim\App($configuration);

$app->config('debug', true);

$app->get('/', function() {
    
	$page = new Page();

	$page->setTpl("index");

});


$app->get('/admin', function() {
    
	$page = new PageAdmin();

	$page->setTpl("index");

});

$app->get('/admin/login', function() {

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login");
});


$app->post('/admin/login', function(Request $request, Response $response, array $args) {

	$data = $request->getParsedBody();

	$login = filter_var($data['login'], FILTER_SANITIZE_STRING);
	$password = filter_var($data['password'], FILTER_SANITIZE_STRING);

	$conn = new Connection();
	$conn->login($login, $password);

	header("Location: /Udemy/PHP/ecommerce/admin");
	//exit;

});


//$app->post('/admin/login', function(Request $request, Response $response, array $args)

$app->run();


 ?>