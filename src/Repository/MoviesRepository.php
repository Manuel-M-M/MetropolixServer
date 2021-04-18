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

    public function findTop20Popularity()
    {
        return $this->createQueryBuilder('m')
            ->orderBy('m.popularity', 'DESC')
            ->setMaxResults(20)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findTop20Rated()
    {
        return $this->createQueryBuilder('m')
            ->orderBy('m.popularity', 'DESC')
            ->setMaxResults(20)
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Details[] Returns an array of Movies objects
    //  */
    
    public function searchByTitle($title)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.title LIKE :val')
            ->setParameter('val', $title.'%')
            ->setMaxResults(20)
            ->getQuery()
            ->getResult()
        ;
    }

    
}
