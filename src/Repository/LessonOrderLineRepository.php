<?php

namespace App\Repository;

use App\Entity\LessonOrderLine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method LessonOrderLine|null find($id, $lockMode = null, $lockVersion = null)
 * @method LessonOrderLine|null findOneBy(array $criteria, array $orderBy = null)
 * @method LessonOrderLine[]    findAll()
 * @method LessonOrderLine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LessonOrderLineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LessonOrderLine::class);
    }

    // /**
    //  * @return LessonOrderLine[] Returns an array of LessonOrderLine objects
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
    public function findOneBySomeField($value): ?LessonOrderLine
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
