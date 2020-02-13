<?php

namespace App\Repository;

use App\Entity\ConstraintType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ConstraintType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConstraintType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConstraintType[]    findAll()
 * @method ConstraintType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConstraintTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConstraintType::class);
    }

    // /**
    //  * @return ConstraintType[] Returns an array of ConstraintType objects
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
    public function findOneBySomeField($value): ?ConstraintType
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
