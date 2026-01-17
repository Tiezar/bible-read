<?php
    namespace App\Models;
    class BibleService {
        public function buscarCapitulo($versao, $livro, $capitulo, $token) {
            $url = "https://www.abibliadigital.com.br/api/verses/$versao/$livro/$capitulo";
            $headers = [
                'Authorization: Bearer ' . $token,
            ];

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $resposta = curl_exec($ch);
            curl_close($ch);

            $dados = json_decode($resposta, true);

            return $dados;
        }
    }
?>