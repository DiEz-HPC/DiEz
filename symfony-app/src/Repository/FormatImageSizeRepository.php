<?php

namespace App\Repository;

use App\Entity\FormatImageSize;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FormatImageSize|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormatImageSize|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormatImageSize[]    findAll()
 * @method FormatImageSize[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormatImageSizeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FormatImageSize::class);
    }

    // /**
    //  * @return FormatImageSize[] Returns an array of FormatImageSize objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FormatImageSize
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
