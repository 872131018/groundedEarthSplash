<?php
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
    $url = 'http://73.243.194.169/nukleus/index.php/saveEmail/index';
    /*
    * Init the curl handle
    */
    $ch = curl_init($url);
    /*
    * Build post data to pass through
    */
    $post = http_build_query($data, '', '&');
    # Setting our options
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    # Get the response
    $response = curl_exec($ch);
    curl_close($ch);
    var_dump($response); die;
    /*
    * Render response
    */
    return $this->renderer->render($response, 'splash.php', $args);
});
