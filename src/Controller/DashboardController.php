<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\City;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(): Response
    {
      $entityManager = $this->getDoctrine()->getManager();
      $cities = $entityManager->getRepository(City::class)
        ->findAll();

      return $this->render('dashboard/index.html.twig', [
        'cities' => $cities,
        'details' => ['weather' => '', 'humidity' => ''],
      ]);
//        return $this->json([
//            'message' => 'Welcome to your new controller!',
//            'path' => 'src/Controller/DashboardController.php',
//        ]);
    }
}
