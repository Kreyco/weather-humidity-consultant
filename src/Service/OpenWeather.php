<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class OpenWeather
{
  private $client;

  public function __construct(HttpClientInterface $client)
  {
    $this->client = $client;
  }

  public function fetchWeatherInformation(): array
  {
    $content = [];
    $response = $this->client->request("GET", "https://api.openweathermap.org/data/2.5/group", [
      'query' => [
        'id'    => '4164138,3687925,3668605',
        'appid' => 'cddc707c8c7a69e3f485c90860e31c7c',
        'units' => 'metric'
      ]
    ]);

    if (200 !== $response->getStatusCode()) {
      throw new \Exception('There was a problem with the Weather API.');
    }

    if ($response->getContent())
    {
      $content = $response->toArray();
    }

    return $content;
  }
}