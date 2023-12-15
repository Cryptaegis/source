<?php

namespace App\Repository;

use App\Entity\CategorieMission;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CategorieMission>
 *
 * @method CategorieMission|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieMission|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieMission[]    findAll()
 * @method CategorieMission[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieMissionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieMission::class);
    }

//    /**
//     * @return CategorieMission[] Returns an array of CategorieMission objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CategorieMission
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
