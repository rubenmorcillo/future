<?php
/**
 * Created by PhpStorm.
 * User: Rubén
 * Date: 26/01/2020
 * Time: 11:15
 */

namespace AppBundle\Repository;


use AppBundle\Entity\District;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class DistrictRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, District::class);
    }

    public function findByReputationLessThan($value){
        return $this->createQueryBuilder('d')
            ->andWhere('d.reputation < :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult()
            ;
    }


}