<?php
//define url of my website
define('BASE_URL', 'http://carexpress.local/');
//define constants database
define('DB_HOST', '192.168.10.189:3306');
define('DB_NAME', 'carexpressdb');
define('DB_USER', 'root');
define('DB_PASSWORD', 'ErenYager@1234');

//Constant of directory
define('CONFIG', 'config/');
define('CONTROLLER', 'controllers/');
define('MODELS', 'models/');
define('VIEWS', 'views/');

//fonction to manage url
function url($path, $params = [])
{
    $req = http_build_query($params);
    if (!empty($req)) {
        return BASE_URL . $path . '?' . $params;
    }
    return BASE_URL . $path;
}
