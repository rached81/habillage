<?php

namespace App\Repository;

use App\Entity\TypicalDay;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TypicalDay|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypicalDay|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypicalDay[]    findAll()
 * @method TypicalDay[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypicalDayRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypicalDay::class);
    }

    // /**
    //  * @return TypicalDay[] Returns an array of TypicalDay objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypicalDay
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
