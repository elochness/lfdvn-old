<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Article;
use AppBundle\Entity\ArticleCategory;
use Doctrine\ORM\EntityRepository;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;

/**
 * ArticleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticleRepository extends EntityRepository
{

  /**
   * @return Query
   */
  public function queryLatest($caid = ArticleCategory::ARTICLE_PRINCIPAL)
  {
    $query = $this->getEntityManager()
      ->createQuery('
              SELECT a
              FROM AppBundle:Article a
              INNER JOIN AppBundle:ArticleCategory ac
              WITH a.articleCategory = ac.id
              WHERE a.enabled = true
              AND ac.id = :caid
              ORDER BY a.updatedAt, a.createdAt DESC
          ')
      ;
      $query->setParameter('caid', $caid);
      return $query;
  }

  /**
   * @param int $page
   *
   * @return
   */
  public function findLatest($page = 1)
  {
      $paginator = new Pagerfanta(new DoctrineORMAdapter($this->queryLatest(), false));
      $paginator->setMaxPerPage(Article::NUM_ITEMS);
      $paginator->setCurrentPage($page);

      return $paginator;
  }


    public function findEnterprise()
    {
        return $this->queryLatest(ArticleCategory::ARTICLE_ENTERPRISE)->getResult();
    }

    public function findBandeau()
    {
        return $this->queryLatest(ArticleCategory::ARTICLE_BANDEAU)->getResult();
    }

}
