<?php

namespace App\Repository;

use App\Entity\NamePlanque;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NamePlanque>
 *
 * @method NamePlanque|null find($id, $lockMode = null, $lockVersion = null)
 * @method NamePlanque|null findOneBy(array $criteria, array $orderBy = null)
 * @method NamePlanque[]    findAll()
 * @method NamePlanque[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NamePlanqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NamePlanque::class);
    }

//    /**
//     * @return NamePlanque[] Returns an array of NamePlanque objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?NamePlanque
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
