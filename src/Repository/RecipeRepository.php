<?php

namespace App\Repository;

use Doctrine\Common\Collections\Collection;

/**
 * Class RecipeRepository
 *
 * @package App\Repository
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class RecipeRepository extends BaseRepository
{
    public function loadAll(string $cuisine = null, int $offset = 0, int $limit = 20): array
    {
        $qb = $this->createQueryBuilder('r');

        if (null !== $cuisine) {
            $qb->where('r.recipeCuisine = :cuisine')
                ->setParameter('cuisine', $cuisine);
        }

        $qb->setFirstResult($offset)
            ->setMaxResults($limit);

        return $qb->getQuery()->getResult();
    }
}