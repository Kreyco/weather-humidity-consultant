<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\City;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CityController extends AbstractController
{
    /**
     * @Route("/city", name="city")
     */
    public function index(): Response
    {
        return $this->render('city/index.html.twig', [
            'controller_name' => 'CityController',
        ]);
    }

  /**
   * @Route("/city/create", name="create_city")
   */
  public function createCity(EntityManagerInterface $entityManager, ValidatorInterface $validator): Response
  {
//    $entityManager = $this->getDoctrine()->getManager();

    $city = new City();
    $city->setName('Miami');

    $errors = $validator->validate($city);
    if (count($errors) > 0)
    {
      return new Response((string) $errors, Response::HTTP_BAD_REQUEST);
    }

    $entityManager->persist($city);
    $entityManager->flush();

    return new Response("Saved new city with id {$city->getId()}");
  }

  /**
   * @Route("/city/{id}", name="city_show")
   */
  public function show(int $id): Response
  {
    $city = $this->getDoctrine()
      ->getRepository(City::class)
      ->find($id);

    if (!$city) {
      throw $this->createNotFoundException(
        "No city found for id $id"
      );
    }

//    return new Response("Check out this great city: {$city->getName()}");
   return $this->render('city/show.html.twig', ['city' => $city]);
  }

  /**
   * @Route("/city/{id}/delete", name="city_delete")
   */
  public function delete(int $id, EntityManagerInterface $entityManager): Response
  {
    $city = $this->getDoctrine()
      ->getRepository(City::class)
      ->find($id);

    if (!$city) {
      throw $this->createNotFoundException(
        "No city found for id $id"
      );
    }

    $entityManager->remove($city);
    $entityManager->flush();

//    return new Response("Check out this great city: {$city->getName()}");
    return $this->render('city/show.html.twig', ['city' => $city]);
  }
}
