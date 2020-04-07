<?php

namespace App\Repository;

use App\Entity\DataFiles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DataFiles|null find($id, $lockMode = null, $lockVersion = null)
 * @method DataFiles|null findOneBy(array $criteria, array $orderBy = null)
 * @method DataFiles[]    findAll()
 * @method DataFiles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DataFilesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DataFiles::class);
    }

    // /**
    //  * @return DataFiles[] Returns an array of DataFiles objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DataFiles
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
