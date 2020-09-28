<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

include "NotORM.php";

require __DIR__ . '/../vendor/autoload.php';

// Add Database Connection
$connection = new PDO("mysql:host=172.17.0.2;dbname=riseup", 'root', 'mysql');
$db = new NotORM($connection);

// Instantiate App
$app = AppFactory::create();

// Add error middleware
$app->addErrorMiddleware(true, true, true);

// Add routes
// Returns all users after retrieving the data from the db.
$app->get('/api/users', function (Request $request, Response $response) use($db, $app) {
    $data = $db->users();
    $newResponse = $response->withJson($data, 200);
    return $newResponse;
});

// Retrieves a user by it's ID
$app->get('/api/user[/{id}]', function (Request $request, Response $response, $id) use($db, $app) {
    $data = $db->users()->where('id', $id);
    $newResponse = $response->withJson($data, 200);
    return $newResponse;
});

// POST request that received the data and stores it in the db. Returns the row inserted afterwards
$app->post('/api/users', function (Request $request, Response $response) use($db, $app) {
    $data = array(
        'name' => $request->getParsedBodyParam("name"),
        'age' => $request->getParsedBodyParam("age"),
        'email' => $request->getParsedBodyParam("email"),
        'city' => $request->getParsedBodyParam("city"),
        'country' => $request->getParsedBodyParam("country"),
        'zip_code' => $request->getParsedBodyParam("zip_code"),
        'phone_number' => $request->getParsedBodyParam("phone_number")
    );
    $result = $db->users()->insert($data);
    $newResponse = $response->withJson($result, 200);
    return $newResponse;
});

// PUT to update an existing resource by receiving the new data and updating it.
// PATCH would also work specially if we're replacing only certain parts of the resource.
$app->put('/api/user[/{id}]', function (Request $request, Response $response, $id) use($db, $app) {
    $data = array(
        'name' => $request->getParsedBodyParam("name"),
        'age' => $request->getParsedBodyParam("age"),
        'email' => $request->getParsedBodyParam("email"),
        'city' => $request->getParsedBodyParam("city"),
        'country' => $request->getParsedBodyParam("country"),
        'zip_code' => $request->getParsedBodyParam("zip_code"),
        'phone_number' => $request->getParsedBodyParam("phone_number")
    );
    $row = $db->users()->where('id', $id);
    $result = $row->update($data);
    $newResponse = $response->withJson($data, 200);
    return $newResponse;
});

// Receives the ID of the user that was requested to be deleted
$app->delete('/api/user[/{id}]', function (Request $request, Response $response, $id) use($db, $app) {
    $row = $db->users()->where('id', $request->getParsedBodyParam("id"));
    $result = $row->delete();
    $newResponse = $response->withJson($result, 200);
    return $newResponse;
});


/* $app->get('/hello/{name}', function (Request $request, Response $response, $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
}); */

$app->run();