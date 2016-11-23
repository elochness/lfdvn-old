<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Product;
use Doctrine\ORM\EntityRepository;
use Pagerfanta\Adapter\DoctrineORMAdapter;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends EntityRepository
{

  /**
   *
   * @return
   */
  public function findActiveCategory()
  {
      return $this->getEntityManager()
          ->createQuery('
              SELECT c
              FROM AppBundle:Category c
              WHERE c.enabled = true
              ORDER BY c.name ASC
          ')->getResult();
  }
}
