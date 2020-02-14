<?php

namespace App\Repository;

use App\Entity\StationLine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method StationLine|null find($id, $lockMode = null, $lockVersion = null)
 * @method StationLine|null findOneBy(array $criteria, array $orderBy = null)
 * @method StationLine[]    findAll()
 * @method StationLine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StationLineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StationLine::class);
    }

    // /**
    //  * @return StationLine[] Returns an array of StationLine objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StationLine
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
