<?php

namespace App\Repository;

use App\Entity\Dressing;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Dressing|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dressing|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dressing[]    findAll()
 * @method Dressing[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DressingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dressing::class);
    }

    // /**
    //  * @return Dressing[] Returns an array of Dressing objects
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
    public function findOneBySomeField($value): ?Dressing
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
