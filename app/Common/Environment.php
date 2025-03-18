<?php

namespace App\Common;

class Environment 
{
    /**
     * Método responsável por carregar as variáveis de ambiente do projecto
     * @param string $dir - caminho absoluto da pasta onde  encontra-se o arquivo .env
     */
    public static function load($dir) 
    {
        // VERIFICA SE O ARQUIVO .ENV EXISTE
        if(!file_exists($dir . str_replace('/', '\\', '/../../.env'))) {
            return false;
        }

        // DEFINE AS VARIAVEIS DE AMBIENTE
        $lines = file($dir . str_replace('/', '\\', '/../../.env'));
        foreach($lines as $line) {
            putenv(trim($line));
        }
    }
}
