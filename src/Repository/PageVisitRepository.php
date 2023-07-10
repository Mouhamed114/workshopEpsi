<?php

namespace App\Repository;

use App\Entity\PageVisit;
use App\Entity\Picture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PageVisit>
 *
 * @method PageVisit|null find($id, $lockMode = null, $lockVersion = null)
 * @method PageVisit|null findOneBy(array $criteria, array $orderBy = null)
 * @method PageVisit[]    findAll()
 * @method PageVisit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PageVisitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PageVisit::class);
    }

    public function save(PageVisit $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PageVisit $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function countByPicture(Picture $picture): int
    {
        return $this->createQueryBuilder('pv')
            ->select('count(pv.id)')
            ->where('pv.picture = :picture')
            ->setParameter('picture', $picture)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function getPageVisitsCountByRouteWithDates(string $routeName): array
    {
        return $this->createQueryBuilder('pv')
            ->select("pv.visitedAt, COUNT(pv.id) AS count")
            ->where('pv.routeName = :routeName')
            ->setParameter('routeName', $routeName)
            ->groupBy('pv.visitedAt')
            ->getQuery()
            ->getResult();
    }

    public function getPageVisitsCountByPictureWithDates(Picture $picture): array
    {
        return $this->createQueryBuilder('pv')
            ->select("pv.visitedAt, COUNT(pv.id) AS count")
            ->where('pv.picture = :picture')
            ->setParameter('picture', $picture)
            ->groupBy('pv.visitedAt')
            ->getQuery()
            ->getResult();
    }
//    /**
//     * @return PageVisit[] Returns an array of PageVisit objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PageVisit
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
