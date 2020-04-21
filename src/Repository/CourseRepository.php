<?php

namespace App\Repository;

use App\Entity\Course;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @method Course|null find($id, $lockMode = null, $lockVersion = null)
 * @method Course|null findOneBy(array $criteria, array $orderBy = null)
 * @method Course[]    findAll()
 * @method Course[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CourseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, PaginatorInterface $paginator)
    {
        parent::__construct($registry, Course::class);
        $this->paginator = $paginator;
    }

    public function findAllPaginated($page)
    {
        $dbquery = $this->createQueryBuilder('course')
        ->getQuery();
        $pagination = $this->paginator->paginate($dbquery, $page, 6);
        return $pagination;

    }

    public function findByLanguage(string $query, int $page, ?string $sort_method)
    {
        $sort_method = $sort_method != 'rating' ? $sort_method : 'ASC'; //tmp
        $querybuilder = $this->createQueryBuilder('c');
        $searchTerms = $this->prepareQuery($query);
        foreach ($searchTerms as $key => $term)
        {
            $querybuilder
            ->orWhere('c.namecourse LIKE :t_'.$key)
            ->setParameter('t_'.$key, '%'.trim($term).'%');
        }

            $dbquery =  $querybuilder
            ->orderBy('c.namecourse', $sort_method)
            ->getQuery();

        return $this->paginator->paginate($dbquery, $page, 5);
    }

    

    
    public function courseDetails($id)

    {
        return $this->createQueryBuilder('c')
        ->leftJoin('c.comments', 'm')
        ->leftJoin('c.user', 'u')
        ->addSelect('c', 'u')
        ->where('c.id = :id')
        ->setParameter('id', $id)
        ->getQuery()
        ->getOneOrNullResult();
    }

    private function prepareQuery(string $query): array
        {
            return explode(' ',$query);
        }
    // /**
    //  * @return Course[] Returns an array of Course objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Course
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
