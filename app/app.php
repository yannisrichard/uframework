<?php

$loader = require __DIR__ . '/../vendor/autoload.php';
use Http\Request;
use Http\Response;



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
    //~ return $app->render('statuses.php', ['statuses' => $StatusesFinder->findAll()]);
	
	$format = $request->guessBestFormat();
	var_dump($format);
	//Fin TP4 : Testing commande curl
	//Actuellement retourne du HTML
	//Mais devrait retourner JSON
	
	//Note : $format retourne text/html
	
	
	
    $response = null;
    $statuses = $StatusesFinder->findAll();
    if ('json' === $format) {
        $response = new Response(json_encode($statuses,JSON_FORCE_OBJECT), 200, array('Content-Type' => 'application/json'));
        $response->send();
        return;
    }
    return $app->render('statuses.php', array('statuses' => $statuses));

    
});


/**
 * GET /statuses/id
 */
$app->get('/statuses/(\d+)', function (Request $request, $id) use ($app, $StatusesFinder) {
	$status = $StatusesFinder->findOneById($id);
    if ($status === null) {
        throw new \Exception\HttpException(404, "Status ID non existant");
    }
    
	$format = $request->guessBestFormat();
    if ('json' === $format) {
        $response = new Response(json_encode($status), 200, array('Content-Type' => 'application/json'));
        $response->send();
        return;
    }

	return $app->render('status.php', ['status' => $status, 'id' => $id]);
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
    $format = $request->guessBestFormat();
	if ("html" === $format || "json" === $format) {
		$user = htmlspecialchars($request->getParameter('username'));
		$message = htmlspecialchars($request->getParameter('message'));
		$finder = new Model\JsonFinder();
		$finder->create($user, $message);
	}
	
	$app->redirect('/statuses');
});




/**
 * POST /users
 */
 
 
 
/**
 * DELETE /statuses/id
 */
$app->delete('/statuses/(\d+)', function (Request $request, $id) use ($app, $StatusesFinder) {
	$status = $StatusesFinder->findOneById($id);
    if ($status === null) {
        throw new \Exception\HttpException(404, "Status doesn't exist");
    }
    $StatusesFinder->delete($id);
    
    //Note: A REST API should return a 204 status code which stands for No Content.
  
	$app->redirect('/statuses');
});
 
 
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
