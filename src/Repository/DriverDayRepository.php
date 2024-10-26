<?php

namespace App\Repository;

use App\Entity\DriverDay;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DriverDay>
 *
 * @method DriverDay|null find($id, $lockMode = null, $lockVersion = null)
 * @method DriverDay|null findOneBy(array $criteria, array $orderBy = null)
 * @method DriverDay[]    findAll()
 * @method DriverDay[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DriverDayRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DriverDay::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(DriverDay $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(DriverDay $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
}
