<?php
/*
* Load any .env values that might be needed
*/
$dotenv = new Dotenv\Dotenv(__DIR__.'/..');
$dotenv->load();
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
  $args['images'] = [
    'bear.png',
    'buffalo.png',
    'cougar.png',
    'mountains.png',
    'skull.png',
    'wolf.png'
  ];
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
  $request_body = $request->getParsedBody();

  $data = array(
      'email' => $request_body['email'],
      'name' => $request_body['name'],
      'city' => $request_body['city'],
      'state' => $request_body['state']
  );
  /*
  * Create a client and provide a base URL
  */
  $guzzle_client = new Client(getenv('MOTHERSHIP_URL'));
  /*
  * Create and send the request object
  */
  $guzzle_request = $guzzle_client->post(getenv('SIGNUP_ENDPOINT'), array(), $data);
  /*
  * Make the request, use echo to get the response string
  */
  $guzzle_response = $guzzle_request->send();
  $status = $guzzle_response->json();
  /*
  * Render response
  */
  switch($status['result'])
  {
    case "true":
      return $this->renderer->render($response, 'success.php', $args);
      break;
    default:
      return $this->renderer->render($response, 'failure.php', $args, 500);
      break;
  }
});
