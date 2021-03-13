<?php

namespace App\Repository;

use App\Entity\Movies;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Movies|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movies|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movies[]    findAll()
 * @method Movies[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MoviesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Movies::class);
    }

    

    // /**
    //  * @return Movies[] Returns an array of Movies objects
    //  */
    

     public function findByPage($page)
    {
        $first = ($page - 1 ) * 20;
        return $this->createQueryBuilder('m')
            ->setFirstResult($first)
            ->setMaxResults(20)
            ->getQuery()
            ->getResult()
        ;
    }

    

    public function findByTitle($title)
    {
        return $this->createQueryBuilder('m')
            // ->andWhere('m.exampleField = :val')
            ->setParameter('val', $title)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(20)
            ->getQuery()
            // ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?Movies
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
