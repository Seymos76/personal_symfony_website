<?php

namespace App\Repository;

use App\Entity\WorkProcess;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WorkProcess|null find($id, $lockMode = null, $lockVersion = null)
 * @method WorkProcess|null findOneBy(array $criteria, array $orderBy = null)
 * @method WorkProcess[]    findAll()
 * @method WorkProcess[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WorkProcessRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WorkProcess::class);
    }

    // /**
    //  * @return WorkProcess[] Returns an array of WorkProcess objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WorkProcess
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
