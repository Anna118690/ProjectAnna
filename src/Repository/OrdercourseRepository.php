<?php

namespace App\Repository;

use App\Entity\Ordercourse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ordercourse|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ordercourse|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ordercourse[]    findAll()
 * @method Ordercourse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrdercourseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ordercourse::class);
    }


    public function orderDetails($id)

    {
        return $this->createQueryBuilder('o')
     
        ->leftJoin('o.reservations', 'r')
        ->leftJoin('o.student', 'u')
        ->addSelect('o', 'r', 'u')
        ->where('o.id = :id')
        ->setParameter('id', $id)
        ->getQuery()
        ->getOneOrNullResult();
    }

    // /**
    //  * @return Ordercourse[] Returns an array of Ordercourse objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ordercourse
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
