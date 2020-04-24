<?php

namespace App\Repository;

use App\Entity\LessonOrder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LessonOrder|null find($id, $lockMode = null, $lockVersion = null)
 * @method LessonOrder|null findOneBy(array $criteria, array $orderBy = null)
 * @method LessonOrder[]    findAll()
 * @method LessonOrder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LessonOrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LessonOrder::class);
    }

    // /**
    //  * @return LessonOrder[] Returns an array of LessonOrder objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LessonOrder
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
