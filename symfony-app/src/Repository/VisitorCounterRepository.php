<?php

namespace App\Repository;

use App\Entity\VisitorCounter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VisitorCounter|null find($id, $lockMode = null, $lockVersion = null)
 * @method VisitorCounter|null findOneBy(array $criteria, array $orderBy = null)
 * @method VisitorCounter[]    findAll()
 * @method VisitorCounter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VisitorCounterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VisitorCounter::class);
    }


    public function findCountByYear(string $date)
    {
        $date = strtotime($date);
        $result = [];
        $visitors =  $this->createQueryBuilder('v')
            ->andWhere('v.Date >= :val')
            ->setParameter('val', $date)
            ->orderBy('v.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;

        foreach($visitors as $visitor) {
            if (isset($result[$visitor->getDate()->format('n')])) {
                $result[$visitor->getDate()->format('n')] ++ ;
            } else {
                $result[$visitor->getDate()->format('n')] = 1;
            }

        }

        return $result;

    }
    

    /*
    public function findOneBySomeField($value): ?VisitorCounter
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
