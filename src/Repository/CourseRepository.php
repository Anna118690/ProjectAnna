<?php

namespace App\Repository;

use App\Entity\Course;
use App\Data\SearchData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Knp\Component\Pager\Pagination\PaginationInterface;

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

    
        /**
     * Recupere courses
     * @return PaginationInterface
     */
public function findSearch(SearchData $search) : PaginationInterface
{
    $query= $this
    ->createQueryBuilder('c') // course
    ->select('l', 'c')
    ->select('v', 'c')
    ->select('l', 'c')
    ->join('c.language', 'l')
    ->join('c.approach', 'a')
    ->join('c.level', 'v');

    if (!empty($search->q)) {
        $query = $query
        ->andWhere('c.namecourse LIKE :q')
        ->setParameter('q', "%{$search->q}%");

    }
    if (!empty($search->min)) {
        $query = $query
        ->andWhere('c.priceActualHour >= :min')
        ->setParameter('min', $search->min);

    }

    if (!empty($search->max)) {
        $query = $query
        ->andWhere('c.priceActualHour <= :max')
        ->setParameter('max', $search->max);

    }


     if (!empty ($search->languages))
     {
         $query = $query
         ->andWhere('l.id IN (:languages)')
         ->setParameter('languages', $search->languages);
     }

     if (!empty ($search->levels))
     {
         $query = $query
         ->andWhere('v.id IN (:levels)')
         ->setParameter('levels', $search->levels);
     }

     if (!empty ($search->approachs))
     {
         $query = $query
         ->andWhere('a.id IN (:approachs)')
         ->setParameter('approachs', $search->approachs);
     }





    $query = $query-> getQuery();
    return $this->paginator->paginate(
        $query, 
       $search->page, 
        6);

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
        $sort_method =  'ASC'; //tmp
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
        ->leftJoin('c.dataFiles', 'd')
        ->leftJoin('c.reservations', 'r')
        ->leftJoin('c.user', 'u')
        ->addSelect('c', 'u', 'd')
        ->where('c.id = :id')
        ->setParameter('id', $id)
        ->getQuery()
        ->getOneOrNullResult();
    }
    private function prepareQuery(string $query): array
        {
           $terms = array_unique(explode(' ', $query));
           return array_filter($terms, function ($term){
               return 2 <= mb_strlen($term);
           });
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
