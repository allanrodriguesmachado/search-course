<?php

namespace App\Search;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\DomCrawler\Crawler;

class Course
{
    private ClientInterface $httpClient;
    private Crawler $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    /**
     * @throws GuzzleException
     */
    public function search(string $url): Crawler
    {
        $response = $this->httpClient->request('GET', $url);
        $this->crawler->addHtmlContent($response->getBody());
        return $this->crawler->filter('span.card-curso__nome');
    }
}