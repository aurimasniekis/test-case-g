<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class BaseRepository
 *
 * @package App\Repository
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
abstract class BaseRepository extends EntityRepository
{
    public function persist(object $object): void
    {
        $this->getEntityManager()->persist($object);
    }
    public function save(object $object): void
    {
        $em = $this->getEntityManager();

        $em->persist($object);
        $em->flush();
    }
    public function delete(object $object): void
    {
        $em = $this->getEntityManager();

        $em->remove($object);
        $em->flush();
    }
    public function flush(): void
    {
        $this->getEntityManager()->flush();
    }
}