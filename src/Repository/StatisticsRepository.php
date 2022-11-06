<?php

namespace App\Repository;

use App\Entity\Statistics;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Statistics>
 *
 * @method Statistics|null find($id, $lockMode = null, $lockVersion = null)
 * @method Statistics|null findOneBy(array $criteria, array $orderBy = null)
 * @method Statistics[]    findAll()
 * @method Statistics[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatisticsRepository extends ServiceEntityRepository
{
    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Statistics::class);
    }

    /**
     * Method to add data to the database
     * @param Statistics $entity
     * @param bool $flush
     * @return void
     */
    public function add(Statistics $entity, bool $flush = true): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }

    }

    /**
     * Method to remove data from the database
     * @param Statistics $entity
     * @param bool $flush
     * @return void
     */
    public function remove(Statistics $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Method to get the top used parameters for fizzbuzz route
     * @return array
     * @throws \Doctrine\ORM\NonUniqueResultException
     */

    public function top() : array
    {
        return $this->createQueryBuilder('s')
            ->select('s.request as parameters, COUNT(s.request) as count')
            ->groupBy("s.request")
            ->orderBy("count", "desc")
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }


}
