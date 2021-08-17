<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{

  public function getFilters()
  {
    return [
      new TwigFilter('temperature', [$this, 'formatTemperature']),
      new TwigFilter('humidity', [$this, 'formatHumidity']),
    ];
  }

  public function formatTemperature ($number, $symbol = "C°")
  {
    $number = "{$number} {$symbol}";

    return $number;
  }

  public function formatHumidity ($number, $symbol = "%")
  {
    $number = "{$number}{$symbol}";

    return $number;
  }
}