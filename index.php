<?php

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

require_once __DIR__ . '/vendor/autoload.php';

$client = new Client(['verify' => false, 'base_uri' => 'https://www.alura.com.br/']);
$response = $client->request('GET', 'https://www.alura.com.br/cursos-online-programacao/php');

$search = new App\Search\Course(
    $client,
    new Crawler()
);

$course = $search->search('cursos-online-programacao/php');

foreach ( $course AS $item) {
    echo $item->textContent . PHP_EOL;
}
