<?php

namespace App\Repository;

use App\Entity\AvatarCourse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AvatarCourse|null find($id, $lockMode = null, $lockVersion = null)
 * @method AvatarCourse|null findOneBy(array $criteria, array $orderBy = null)
 * @method AvatarCourse[]    findAll()
 * @method AvatarCourse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvatarCourseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AvatarCourse::class);
    }

    // /**
    //  * @return AvatarCourse[] Returns an array of AvatarCourse objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AvatarCourse
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
