<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

include "NotORM.php";

require __DIR__ . '/../vendor/autoload.php';

// Add Database Connection information
$connection = new PDO("mysql:host=172.17.0.2;dbname=riseup", 'root', 'mysql');
$db = new NotORM($connection);
//Defining the table so we don't repeat the same stuff over and over again
$table = $db->users();

// Instantiate App
$app = AppFactory::create();

// Add error middleware
$app->addErrorMiddleware(true, true, true);

// Add routes
// Returns all users after retrieving the data from the db.
$app->get('/api/users', function (Request $request, Response $response) use($table, $app) {
    $data = $table;
    $newResponse = $response->withJson($data, 200);
    return $newResponse;
});

// Retrieves a user by it's ID
$app->get('/api/user[/{id}]', function (Request $request, Response $response, $id) use($table, $app) {
    $data = $table->where('id', $id);
    $newResponse = $response->withJson($data, 200);
    return $newResponse;
});

// POST request that received the data and stores it in the db. Returns the row inserted afterwards
$app->post('/api/users', function (Request $request, Response $response) use($table, $app) {
    $data = array(
        'name' => $request->getParsedBodyParam("name"),
        'age' => $request->getParsedBodyParam("age"),
        'email' => $request->getParsedBodyParam("email"),
        'city' => $request->getParsedBodyParam("city"),
        'country' => $request->getParsedBodyParam("country"),
        'zip_code' => $request->getParsedBodyParam("zip_code"),
        'phone_number' => $request->getParsedBodyParam("phone_number")
    );
    $result = $table->insert($data);
    $newResponse = $response->withJson($result, 200);
    return $newResponse;
});

// PUT to update an existing resource by receiving the new data and updating it.
// PATCH would also work specially if we're replacing only certain parts of the resource.
$app->put('/api/user[/{id}]', function (Request $request, Response $response, $id) use($table, $app) {
    $data = array(
        'name' => $request->getParsedBodyParam("name"),
        'age' => $request->getParsedBodyParam("age"),
        'email' => $request->getParsedBodyParam("email"),
        'city' => $request->getParsedBodyParam("city"),
        'country' => $request->getParsedBodyParam("country"),
        'zip_code' => $request->getParsedBodyParam("zip_code"),
        'phone_number' => $request->getParsedBodyParam("phone_number")
    );
    $row = $table->where('id', $id);
    $result = $row->update($data);
    $newResponse = $response->withJson($data, 200);
    return $newResponse;
});

// Receives the ID of the user that was requested to be deleted
$app->delete('/api/user[/{id}]', function (Request $request, Response $response, $id) use($table, $app) {
    $row = $table->where('id', $id);
    $result = $row->delete();
    $newResponse = $response->withJson($result, 200);
    return $newResponse;
});

$app->run();