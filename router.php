<?php
function routeUrl() {
    $method = $_SERVER['REQUEST_METHOD'];
    $requestURI = explode('/', $_SERVER['REQUEST_URI']);
    $scriptName = explode('/', $_SERVER['SCRIPT_NAME']);

    for ($i = 0; $i < sizeof($scriptName); $i++) {
        if ($requestURI[$i] == $scriptName[$i]) {
            unset($requestURI[$i]);
        }
    }
    # continued...
    
    error_log("Request URI: " . print_r($requestURI, true)}", 0);
  
    $command = array_values($requestURI);
    $controller = 'controllers/' . $command[0] . '.php';
    $func = strtolower($method) . '_' . (isset($command[1]) ? $command[1] : 'index');
    $params = array_slice($command, 2);

    error_log("Looking for controller ${controller}", 0);

    if (file_exists($controller)) {
        require $controller;
        if (function_exists($func)) {
            $func($params);
            exit();
        }
        else {
            die("Command '$func' doesn't exist.");
        }
    } else {
        die("Controller '$controller' doesn't exist.");
    }
}

routeUrl();