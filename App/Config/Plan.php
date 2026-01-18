<?php
    namespace App\Config;

    class Plan {
        public static function diario($data, $versao = 'nvi') {
            $cronograma = [
                "01-17" => [
                    ['versao' => $versao , 'livro' => 'gn', 'capitulo' => '34'],
                    ['versao' => $versao , 'livro' => 'gn', 'capitulo' => '35'],
                    ['versao' => $versao , 'livro' => 'gn', 'capitulo' => '36'],
                ],
                "01-18" => [
                    ['versao' => $versao , 'livro' => 'gn', 'capitulo' => '40'],
                    ['versao' => $versao , 'livro' => 'gn', 'capitulo' => '41'],
                ],
                "01-19" => [
                    ['versao' => $versao , 'livro' => '', 'capitulo' => ''],
                    ['versao' => $versao , 'livro' => '', 'capitulo' => ''],
                ],
            ];

            return $cronograma[$data];
        }
    }
?>