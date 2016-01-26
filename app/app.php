<?php

require __DIR__ . '/../autoload.php';


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
$app->get('/statuses', function () use ($app, $StatusesFinder) {
    return $app->render('statuses.php', ['statuses' => $StatusesFinder->findAll()]);
});


/**
 * GET /statuses/id
 */
$app->get('/statuses/(\d+)', function ($id) use ($app, $StatusesFinder) {
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
