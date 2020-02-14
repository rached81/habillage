<?php

namespace App\Repository;

use App\Entity\DressingType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DressingType|null find($id, $lockMode = null, $lockVersion = null)
 * @method DressingType|null findOneBy(array $criteria, array $orderBy = null)
 * @method DressingType[]    findAll()
 * @method DressingType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DressingTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DressingType::class);
    }

    // /**
    //  * @return DressingType[] Returns an array of DressingType objects
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
    public function findOneBySomeField($value): ?DressingType
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
