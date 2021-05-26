#!/usr/bin/env php
<?php

require 'vendor/autoload.php';


use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Alura\BuscadorDeCursos\Buscador;

$cliente = new Client(['base_uri'=>'https://www.alura.com.br/']);
$crawler = new Crawler();


/*$resposta = $cliente->request('GET', 'https://www.alura.com.br/cursos-online-programacao/php');
$html = $resposta->getBody();

$crawler = new Crawler();
$crawler->addHtmlContent($html);

$cursos = $crawler->filter('span.card-curso__nome');
*/

$buscador = new Buscador($cliente, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach ($cursos as $curso) {
    //$curso é um elemento DOM
    exibeMensagem($curso);
}
