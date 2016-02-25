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
* Set the index route for the splash page
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
    /*
    * Create a client and provide a base URL
    */
    $client = new Client($url);
    /*
    * Create and send the request object
    */
    $request = $client->post('nukleus/index.php/saveEmail/index', array(), $data);
    /*
    * Make the request, use echo to get the response string
    */
    $response = $request->send()->getBody();
    echo $response; die;
    /*
    * Render response
    */
    return $this->renderer->render($response, 'splash.php', $args);
});
