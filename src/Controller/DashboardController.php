<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\City;
use App\Service\OpenWeather;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(OpenWeather $openWeather): Response
    {
      $entityManager = $this->getDoctrine()->getManager();
      $cities = $entityManager->getRepository(City::class)
        ->findAll();

      $citiesInfo = $openWeather->fetchWeatherInformation();
      $citiesInfo = isset($citiesInfo['list']) ? $citiesInfo['list'] : $citiesInfo;

      return $this->render('dashboard/index.html.twig', [
        'cities' => $cities,
        'citiesInfo' => $citiesInfo
      ]);
    }
}
