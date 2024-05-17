<?php
//define url of my website
// define('BASE_URL', 'http://carexpress.local/');

// // Vérifie si l'adresse IP est utilisée pour accéder au site
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

// Déterminer l'URL de base en utilisant le protocole et le nom de domaine ou l'adresse IP
$base_url = $protocol . '://' . $_SERVER['HTTP_HOST'] . '/';

// Définir la constante BASE_URL avec l'URL déterminée
define('BASE_URL', $base_url);

//define constants database
// define('DB_HOST', '192.168.10.114');
define('DB_HOST', 'localhost');
define('DB_PORT', 3306);
define('DB_NAME', 'dbcarexpress');
// define('DB_USER', 'devuser');
// define('DB_PASSWORD', 'Dev@1234');
define('DB_USER', 'root');
define('DB_PASSWORD', 'Eren@2806');

//Constant of directory
define('CONFIG', 'config/');
define('CONTROLLER', 'controllers/');
define('MODELS', 'models/');
define('VIEWS', 'views/');
define('STORAGE', 'pictures/');
define('INCLUDES', VIEWS . 'includes');

//fonction to manage url
function url($path, $params = [])
{
    if (isset($params['error'])) {
        $path .= '?error=' . urlencode($params['error']);
        unset($params['error']); // Supprime le message d'erreur de $params
    }
    
    $req = http_build_query($params);
    if (!empty($req)) {
        return BASE_URL . $path . '?' . $req;
    }
    return BASE_URL . $path;
}
