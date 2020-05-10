<?php

namespace App\Repository;

use App\Entity\DataFile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DataFile|null find($id, $lockMode = null, $lockVersion = null)
 * @method DataFile|null findOneBy(array $criteria, array $orderBy = null)
 * @method DataFile[]    findAll()
 * @method DataFile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DataFileRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DataFile::class);
    }


    public function dataFileDetails($id)

    {
        return $this->createQueryBuilder('d')
     
        ->leftJoin('d.course', 'c')
        ->addSelect('d', 'c')
        ->where('d.id = :id')
        ->setParameter('id', $id)
        ->getQuery()
        ->getOneOrNullResult();
    }


    // /**
    //  * @return DataFile[] Returns an array of DataFile objects
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
    public function findOneBySomeField($value): ?DataFile
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
