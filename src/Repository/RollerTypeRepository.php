<?php

namespace App\Repository;

use App\Entity\RollerType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method RollerType|null find($id, $lockMode = null, $lockVersion = null)
 * @method RollerType|null findOneBy(array $criteria, array $orderBy = null)
 * @method RollerType[]    findAll()
 * @method RollerType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RollerTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RollerType::class);
    }

    // /**
    //  * @return RollerType[] Returns an array of RollerType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RollerType
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
