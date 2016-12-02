<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Product;
use Doctrine\ORM\EntityRepository;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;

/**
 * ProductRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductRepository extends EntityRepository
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
              ORDER BY p.updatedAt, p.createdAt DESC
          ')
      ;
  }

  /**
   * @param int $page
   *
   * @return
   */
  public function findLatest($page = 1)
  {
      $paginator = new Pagerfanta(new DoctrineORMAdapter($this->queryLatest(), false));
      $paginator->setMaxPerPage(Product::NUM_ITEMS);
      $paginator->setCurrentPage($page);

      return $paginator;
  }
}
