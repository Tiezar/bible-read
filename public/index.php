<?php

use App\Controllers\HomeController;
use App\Controllers\NotFoundController;
use App\Controllers\ReadController;
    /* require '../app/Controllers/Actual/bible.php';
    require '../app/Controllers/Provider/bible.php';
    
    echo "<h3>Testando função com classe</h3>";
    echo "<hr>";

    $teste = new \app\Controllers\Provider\Bible();
    $teste -> nomePasta();

    echo "<h3>Testando função sem classe</h3>";
    echo "<hr>";

    \App\Controllers\Actual\nomePasta(); 
    
    require '../app/Controllers/Provider/bible.php';

    use App\Controllers\Provider\Bible as BibliaDev;

    $teste = new BibliaDev();
    $teste -> nomePasta();*/

    require dirname(__DIR__) . '/vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->safeLoad();

    require dirname(__DIR__) . '/App/Config/config.php';
    
    spl_autoload_register(function ($className) {
        $caminhoArquivo = str_replace ('\\', '/', $className);

        $arquivoFinal = __DIR__ . '/../' . $caminhoArquivo . '.php';
        if (file_exists($arquivoFinal)) {
            require_once $arquivoFinal;
            echo "";
        } else {
            #echo "Arquivo Não encontrado: $arquivoFinal";
            die();
        }
    }); #AUTOLOADER MANUAL

    $routes = [
        '/bible-read/public/' => 'App\Controllers\HomeController',
        '/bible-read/public/leitura' => 'App\Controllers\ReadController'
    ];

    $urlBase = $_SERVER['REQUEST_URI'];

    $urlLimpa = parse_url($urlBase, PHP_URL_PATH);
    if (array_key_exists($urlLimpa, $routes)) {
        $nomeDaClasse = $routes[$urlLimpa];

        $controller = new $nomeDaClasse();
        $controller -> index();
    } else {
        $controller = new App\Controllers\NotFoundController();
        $controller -> index();
    }

?>