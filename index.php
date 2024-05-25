<?php

declare(strict_types=1);

spl_autoload_register(function (string $name) {
    $name = str_replace(['\\', 'App/'], ['/', ''], $name);
    $path = "./src/$name.php";
    require_once($path);
});

include_once('./src/utils/debug.php');
require_once('./config/config.php');

use App\Exception\AppExcetpion;
use App\Exception\StorageException;
use App\Exception\ConfigurationException;
use App\Controller\NoteController;
use App\Controller\AbstractController;
use App\Request;




try {
    AbstractController::initConfiguration($configuration);
    $request = new Request($_GET, $_POST, $_SERVER);
    $controller = new NoteController($request);
    $controller->run();
} catch (AppExcetpion $e) {
    echo "<h1>Wystąpił błąd w aplikacji</h1>";
    echo "<h2>{$e->getMessage()}</h2>";
} catch (\Throwable $e) {
    echo "<h1>Wystąpił błąd w aplikacji - skontaktuj się z administratorem.</h1>";
    dump($e);
}
