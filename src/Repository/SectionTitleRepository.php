<?php

namespace App\Repository;

use App\Entity\SectionTitle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SectionTitle|null find($id, $lockMode = null, $lockVersion = null)
 * @method SectionTitle|null findOneBy(array $criteria, array $orderBy = null)
 * @method SectionTitle[]    findAll()
 * @method SectionTitle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SectionTitleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SectionTitle::class);
    }

    // /**
    //  * @return SectionTitle[] Returns an array of SectionTitle objects
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
    public function findOneBySomeField($value): ?SectionTitle
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
