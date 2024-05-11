<?php

declare(strict_types=1);

namespace App;

require_once('./src/Controller.php');
include_once('./src/utils/debug.php');
require_once('./config/config.php');
require_once('./Exception/AppException.php');
require_once('./Exception/StorageException.php');
require_once('./Exception/ConfigurationException.php');

use App\Exception\AppExcetpion;
use App\Exception\StorageException;
use App\Exception\ConfigurationException;
use Throwable;



try {
    Controller::initConfiguration($configuration);
    $request = [
        'get' => $_GET,
        'post' => $_POST,
    ];
    $controller = new Controller($request);
    $controller->run();
} catch (AppExcetpion $e) {
    echo "<h1>Wystąpił błąd w aplikacji</h1>";
    echo "<h2>{$e->getMessage()}</h2>";
    dump($e);
} catch (Throwable $e) {
    echo "<h1>Wystąpił błąd w aplikacji - skontaktuj się z administratorem.</h1>";
}
