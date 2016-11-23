<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Product;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

/**
 * This custom Doctrine repository contains some methods which are useful when
 * querying for blog post information.
 * See http://symfony.com/doc/current/book/doctrine.html#custom-repository-classes
 *
 * @author Pierre François
 */
class ProductRepositoryOld extends EntityRepository
{
    /**
     * @return Query
     */
    public function queryLatest()
    {
        return $this->getEntityManager()
            ->createQuery('
                SELECT p
                FROM AppBundle:Product p
                WHERE p.enabled = true
                ORDER BY p.updatedAt DESC
            '))
        ;
    }

    /**
     * @param int $page
     *
     * @return
     */
    public function findLatest($page = 1)
    {
        /*$paginator = new Pagerfanta(new DoctrineORMAdapter($this->queryLatest(), false));*/
        $paginator->setMaxPerPage(Post::NUM_ITEMS);
        $paginator->setCurrentPage($page);

        return $paginator;
    }
}
