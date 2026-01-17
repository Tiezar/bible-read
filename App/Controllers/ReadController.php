<?php
    namespace App\Controllers;
    use App\Models\BibleService;
    use App\Config\Plan;
    class ReadController {
        public function index() {
            $dataHoje = date("m-d");
            $plan = new Plan();           
            $dadosArray = $plan -> diario($dataHoje);

            #var_dump($dataHoje);
            
            if (!isset($dadosArray)) {
                $vazio = "Nada para ler hoje :)";
            } else {
                $indicesArray = count($dadosArray);

                $indiceAtual = $_GET['indice'] ?? 0;
                if (!isset($dadosArray[$indiceAtual])) {
                    $indiceAtual = 0;
                }

                $leituraAtual = $dadosArray[$indiceAtual];

                $linkProximo = null;
                $linkAnterior = null;

                if ($indiceAtual > 0) {
                    $linkAnterior = "?indice=" . ($indiceAtual - 1);
                }

                if ($indiceAtual < ($indicesArray - 1)) {
                    $linkProximo = "?indice=" . ($indiceAtual + 1);
                }
                #echo $linkAnterior;
                #echo $linkProximo;

                $leitura = new BibleService();
                $dados = $leitura ->buscarCapitulo($leituraAtual['versao'], $leituraAtual['livro'], $leituraAtual['capitulo'], API_TOKEN);
            }

            require __DIR__ . '/../Views/Leitura.php';
        }
    }
?>