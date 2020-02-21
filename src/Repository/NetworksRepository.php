<?php

namespace App\Repository;

use App\Entity\Networks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Networks|null find($id, $lockMode = null, $lockVersion = null)
 * @method Networks|null findOneBy(array $criteria, array $orderBy = null)
 * @method Networks[]    findAll()
 * @method Networks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NetworksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Networks::class);
    }

    // /**
    //  * @return Networks[] Returns an array of Networks objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Networks
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
