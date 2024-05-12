<?php

declare(strict_types=1);

namespace App;

require_once('./src/Request.php');
require_once('./src/NoteController.php');
include_once('./src/utils/debug.php');
require_once('./config/config.php');
require_once('./Exception/AppException.php');
require_once('./Exception/StorageException.php');
require_once('./Exception/ConfigurationException.php');

use App\Request;
use App\Exception\AppExcetpion;
use App\Exception\StorageException;
use App\Exception\ConfigurationException;
use Throwable;



try {
    AbstractController::initConfiguration($configuration);
    $request = new Request($_GET, $_POST);
    $controller = new NoteController($request);
    $controller->run();
} catch (AppExcetpion $e) {
    echo "<h1>Wystąpił błąd w aplikacji</h1>";
    echo "<h2>{$e->getMessage()}</h2>";
} catch (Throwable $e) {
    echo "<h1>Wystąpił błąd w aplikacji - skontaktuj się z administratorem.</h1>";
    dump($e);
}
