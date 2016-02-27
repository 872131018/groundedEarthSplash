<?php
/*
* Grab the Guzzle namespace
*/
use Guzzle\Http\Client;
// Routes
/*
* Set the index route for the splash page
*/
$app->get('/', function ($request, $response, $args) {
    // Sample log message
    //$this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    //return $this->renderer->render($response, 'index.phtml', $args);
    return $this->renderer->render($response, 'splash.php', $args);
});
/*
* Set the signup route for the request
*/
$app->post("/signup", function ($request, $response, $args) {
    /*
    * Use cURL to send data to mothership
    */
    $email = $request->getParsedBody()['email'];
    $data = array(
        'email' => $email
    );
    /*
    * Set the url for the mothership!
    */
    $url = 'http://73.243.194.169/';
    //$url = 'http://localhost:8888/';
    /*
    * Create a client and provide a base URL
    */
    $client = new Client($url);
    /*
    * Create and send the request object
    */
    $request = $client->post('groundedEarthMothership/index.php/saveEmail/index', array(), $data);
    /*
    * Make the request, use echo to get the response string
    */
    $response = $request->send();
    $status = $response->json();
    /*
    * Render response
    */
    switch($status['result'])
    {
      case "true":
        return $this->renderer->render($response, 'success.php', $args);
        break;
      default:
        return $this->renderer->render($response, 'failure.php', $args);
        break;
    }
});
