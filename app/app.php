<?php

require __DIR__ . '/../autoload.php';
use Http\Request;


//$StatusesFinder = new \Model\InMemoryFinder();
$StatusesFinder = new \Model\JsonFinder('../data/statuses.json');


// Config
$debug = true;

$app = new \App(new View\TemplateEngine(
    __DIR__ . '/templates/'
), $debug);

/**
 * Index
 */
$app->get('/', function () use ($app) {
    return $app->render('index.php');
});

// ...

/**
 * GET /statuses
 */
$app->get('/statuses', function (Request $request) use ($app, $StatusesFinder) {
    return $app->render('statuses.php', ['statuses' => $StatusesFinder->findAll()]);
});


/**
 * GET /statuses/id
 */
$app->get('/statuses/(\d+)', function (Request $request, $id) use ($app, $StatusesFinder) {
	$status = $StatusesFinder->findOneById($id);
    if ($status === null) {
        throw new \Exception\HttpException(404, "Status ID non existant");
    }
	return $app->render('status.php', ['status' => $status]);
});
 
/**
 * GET /users
 */
 
/**
 * GET /users
 */
 
/**
 * GET /users/name
 */
 
 
/**
 * POST /statuses
 */
 $app->post('/statuses', function (Request $request) use ($app) {
    //access user data 
    //$user = $request->getParameter('foo');
	$user = htmlspecialchars($request->getParameter('username'));
    $message = htmlspecialchars($request->getParameter('message'));
    $finder = new Model\JsonFinder();
    $finder->create($user, $message);
	
	//$app->redirect('/statuses');
});




/**
 * POST /users
 */
 
 
 
/**
 * DELETE /statuses
 */

/**
 * DELETE /statuses/id
 */
 
/**
 * DELETE /users
 */
 
/**
 * DELETE /users
 */
 
/**
 * DELETE /users/name
 */
 


return $app;
