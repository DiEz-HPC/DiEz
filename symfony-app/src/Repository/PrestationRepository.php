<?php

namespace App\Repository;

use App\Entity\Prestation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Prestation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Prestation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Prestation[]    findAll()
 * @method Prestation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrestationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Prestation::class);
    }


    public function findForHomepage()
    {
        // select  id, icon, title, teaser from prestation order by position asc
        return $this->createQueryBuilder('p')
            ->select('p.id, p.icon, p.title, p.intro')
            ->orderBy('p.position', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findForFooter()
    {
        return $this->createQueryBuilder('p')
            ->select('p.id, p.title')
            ->orderBy('p.position', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findByOrderedPosition()
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.position', 'ASC')
            ->getQuery()
            ->getResult();
    }
    // /**
    //  * @return Prestation[] Returns an array of Prestation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Prestation
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
