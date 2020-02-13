<?php

namespace App\Repository;

use App\Entity\TypeLine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TypeLine|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeLine|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeLine[]    findAll()
 * @method TypeLine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeLineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeLine::class);
    }

    // /**
    //  * @return TypeLine[] Returns an array of TypeLine objects
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
    public function findOneBySomeField($value): ?TypeLine
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
