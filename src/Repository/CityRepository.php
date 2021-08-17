<?php

namespace App\Repository;

use App\Entity\City;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method City|null find($id, $lockMode = null, $lockVersion = null)
 * @method City|null findOneBy(array $criteria, array $orderBy = null)
 * @method City[]    findAll()
 * @method City[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CityRepository extends ServiceEntityRepository
{
  public function __construct (ManagerRegistry $registry)
  {
    parent::__construct($registry, City::class);
  }

  public function findAllCitiesServiceId (): ?array
  {
    return $this->createQueryBuilder('c')
      ->select('c.city_service_id')
      ->orderBy('c.id', 'ASC')
      ->getQuery()
      ->getArrayResult();
  }

  public function findAllCitiesServiceIdToOneStep (): ?array
  {
    $result = [];
    $cities = $this->findAllCitiesServiceId();

    foreach ($cities as $city)
    {
      $result[] = $city["city_service_id"];
    }

    return $result;
  }
}
