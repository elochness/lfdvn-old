<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use AppBundle\Entity\TaxRate;
use AppBundle\Entity\Purchase;
use AppBundle\Entity\PurchaseItem;
use AppBundle\Entity\Schedule;
use AppBundle\Entity\EnterpriseDetails;
use AppBundle\Entity\Article;
use AppBundle\Entity\ArticleCategory;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Defines the sample data to load in the database when running the unit and
 * functional tests. Execute this command to load the data:
 *
 *   $ php bin/console doctrine:fixtures:load
 *
 * See http://symfony.com/doc/current/bundles/DoctrineFixturesBundle/index.html
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class LoadFixtures implements FixtureInterface, ContainerAwareInterface
{
    /** @var ContainerInterface */
    private $container;

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        //
        $this->loadUsers($manager);
        $this->loadArticles($manager);
        //$this->loadPosts($manager);
        $this->loadSchedules($manager);
        $this->loadEnterpriseDetails($manager);
        $this->loadProducts($manager);
    }

    /**
     * Load information of users
     *
     * @param ObjectManager $manager
     */
    private function loadUsers(ObjectManager $manager)
    {
        $passwordEncoder = $this->container->get('security.password_encoder');

        $johnUser = new User();
        $johnUser->setFirstname('john');
        $johnUser->setLastname('user');
        $johnUser->setUsername('john_user@symfony.com');
        $encodedPassword = $passwordEncoder->encodePassword($johnUser, ' ');
        $johnUser->setPassword($encodedPassword);
        $manager->persist($johnUser);

        $annaAdmin = new User();
        $annaAdmin->setFirstname('anna');
        $annaAdmin->setLastname('admin');
        $annaAdmin->setUsername('anna_admin@symfony.com');
        $annaAdmin->setRoles(['ROLE_ADMIN']);
        $encodedPassword = $passwordEncoder->encodePassword($annaAdmin, 'kitten');
        $annaAdmin->setPassword($encodedPassword);
        $manager->persist($annaAdmin);

        $manager->flush();
    }


//     private function loadPosts(ObjectManager $manager)
//     {
//         foreach (range(1, 30) as $i) {
//             $post = new Post();

//             $post->setTitle($this->getRandomPostTitle());
//             $post->setSummary($this->getRandomPostSummary());
//             $post->setSlug($this->container->get('slugger')->slugify($post->getTitle()));
//             $post->setContent($this->getPostContent());
//             $post->setAuthorEmail('anna_admin@symfony.com');
//             $post->setPublishedAt(new \DateTime('now - '.$i.'days'));

//             foreach (range(1, 5) as $j) {
//                 $comment = new Comment();

//                 $comment->setAuthorEmail('john_user@symfony.com');
//                 $comment->setPublishedAt(new \DateTime('now + '.($i + $j).'seconds'));
//                 $comment->setContent($this->getRandomCommentContent());
//                 $comment->setPost($post);

//                 $manager->persist($comment);
//                 $post->addComment($comment);
//             }

//             $manager->persist($post);
//         }

//         $manager->flush();
//     }

    /**
     * Load information of schedules
     *
     * @param ObjectManager $manager
     */
    private function loadSchedules(ObjectManager $manager)
    {
      $schedule = new Schedule();
      $schedule->setId(1);
      $schedule->setMonday('Fermé');
      $schedule->setTuesday('De 9h-12h à 15h-19h');
      $schedule->setWednesday('De 9h-12h à 15h-19h');
      $schedule->setThursday('De 9h-12h à 15h-19h');
      $schedule->setFriday('De 9h-12h à 15h-19h');
      $schedule->setSaturday('De 9h-12h');
      $schedule->setSunday('Fermé');
      $schedule->setAlertDay('Fermeture exceptionnelle le XX.');

      $manager->persist($schedule);
      $manager->flush();
    }

    private function loadArticles(ObjectManager $manager)
    {
      $categoryPresentation = new ArticleCategory();
      $categoryPresentation->setId(1);
      $categoryPresentation->setName('Article de présentation');
      $manager->persist($categoryPresentation);
      $manager->flush();

      $categoryEnterprise = new ArticleCategory();
      $categoryEnterprise->setId(2);
      $categoryEnterprise->setName('Article sur l\'entreprise');
      $manager->persist($categoryEnterprise);
      $manager->flush();

      $categoryBandeau = new ArticleCategory();
      $categoryBandeau->setId(3);
      $categoryBandeau->setName('Article sur le bandeau droit');
      $manager->persist($categoryBandeau);
      $manager->flush();
      
      $categoryRecette = new ArticleCategory();
      $categoryRecette->setId(4);
      $categoryRecette->setName('Article de recette');
      $manager->persist($categoryRecette);
      $manager->flush();

      $articlePresentation = new Article();
      $articlePresentation->setEnabled(true);
      $articlePresentation->setTitle('Bienvenue au nouveau site de La Fromagerie du vignoble nantais');
      $articlePresentation->setContains('Mon contenu est très limité');
      $articlePresentation->setArticleCategory($categoryPresentation);
      $manager->persist($articlePresentation);
      $manager->flush();

      $articleEnterprise = new Article();
      $articleEnterprise->setEnabled(true);
      $articleEnterprise->setTitle('Présentation de l\'entreprise');
      $articleEnterprise->setContains('L’aventure de la fromagerie Beillevaire commence il y a trentaine d\'années, à Machecoul, au sud de la Loire Atlantique. Agriculteur à ses débuts, comme ses parents, Pascal Beillevaire fait les marchés pour vendre le lait et la crème de la production familiale. Durant les premières vacances, Pascal, accompagné de son épouse Claudine, partent sur les routes de France afin de dénicher les meilleurs fromages de chaque terroir et les proposer à leur clientèle.
La passion fait naître un métier : celui de producteur-fromager. C’est alors qu’ils initient la fromagerie autour des 3 piliers fondateurs.');
      $articleEnterprise->setArticleCategory($categoryEnterprise);
      $manager->persist($articleEnterprise);
      $manager->flush();

      $articleBandeau = new Article();
      $articleBandeau->setEnabled(true);
      $articleBandeau->setTitle('Notre phylosophie');
      $articleBandeau->setContains('Notre production s\'organise dans le respect d\'une agriculture durable et la conservation des méthodes traditionnlles de fabrication. La totalité des fromages sont élaborés dans notre local');
      $articleBandeau->setArticleCategory($categoryBandeau);
      $manager->persist($articleBandeau);
      $manager->flush();
      
      $articleRecette = new Article();
      $articleRecette->setEnabled(true);
      $articleRecette->setTitle('Ma recette');
      $articleRecette->setContains('Notre recette est ...');
      $articleRecette->setArticleCategory($categoryRecette);
      $manager->persist($articleRecette);
      $manager->flush();

    }

    /**
     * Load information of enterprise
     *
     * @param ObjectManager $manager
     */
    private function loadEnterpriseDetails(ObjectManager $manager)
    {
      $enterpriseDetails = new EnterpriseDetails();
      $enterpriseDetails->setId(1);
      $enterpriseDetails->setName('La fromagerie du vignoble nantais');
      $enterpriseDetails->setAddress('9, rue de la XXX');
      $enterpriseDetails->setCodePostal('44140');
      $enterpriseDetails->setCity('Le bignon');
      $enterpriseDetails->setTelephone('XX.XX.XX.XX.XX');

      $manager->persist($enterpriseDetails);
      $manager->flush();
    }

    /**
     * Load information of two products
     *
     * @param ObjectManager $manager
     */
    private function loadProducts(ObjectManager $manager)
    {
      // Tax Rate
      $taxRate10 = new TaxRate();
      $taxRate10->setRate(10.00);
      $manager->persist($taxRate10);

      $taxRate20 = new TaxRate();
      $taxRate20->setRate(20.00);
      $manager->persist($taxRate20);

      // Category
      $painCategory = new Category();
      $painCategory->setName('Pain');
      $painCategory->setEnabled(0);
      $manager->persist($painCategory);

      $chevreCategory = new Category();
      $chevreCategory->setName('Fromage de chèvre');
      $chevreCategory->setEnabled(1);
      $manager->persist($chevreCategory);

      $vacheCategory = new Category();
      $vacheCategory->setName('Fromage de vache');
      $vacheCategory->setEnabled(1);
      $manager->persist($vacheCategory);


      // Product
      $product = new Product();
      $product->setName('Crottin de chèvre au lait cru');
      $product->setDescription($this->getRandomCommentContent());
      $product->setCreatedAt(new \DateTime('now'));
      $product->setUpdatedAt(new \DateTime('now'));
      $product->setPrice(15);
      $product->setQuantity(100);
      $product->setEnabled(1);
      $product->setTaxRate($taxRate10);
      $product->setCategory($chevreCategory);
      $product->setPackaging("200");
      $manager->persist($product);

      $productFro = new Product();
      $productFro->setName('Bouteille de lait cru');
      $productFro->setDescription($this->getRandomCommentContent());
      $productFro->setCreatedAt(new \DateTime('now'));
      $productFro->setUpdatedAt(new \DateTime('now'));
      $productFro->setPrice(8);
      $productFro->setQuantity(22);
      $productFro->setEnabled(1);
      $productFro->setTaxRate($taxRate20);
      $productFro->setCategory($chevreCategory);
      $productFro->setPackaging("80");
      $manager->persist($productFro);


      $purchase = new Purchase();
      $purchase->setDeliveryDate(new \DateTime("now"));
      //$purchase->setGuid(15);
      $manager->persist($purchase);

      $purchasedItems1 = new purchaseItem();
      $purchasedItems1->setProduct($product);
      $purchasedItems1->setQuantity(3);
      $purchasedItems1->setPurchase($purchase);
      $manager->persist($purchasedItems1);

      $purchasedItems2 = new purchaseItem();
      $purchasedItems2->setProduct($productFro);
      $purchasedItems2->setQuantity(7);
      $purchasedItems2->setPurchase($purchase);
      $manager->persist($purchasedItems2);

      $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    private function getPostContent()
    {
        return <<<MARKDOWN
Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor
incididunt ut labore et **dolore magna aliqua**: Duis aute irure dolor in
reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
deserunt mollit anim id est laborum.

  * Ut enim ad minim veniam
  * Quis nostrud exercitation *ullamco laboris*
  * Nisi ut aliquip ex ea commodo consequat

Praesent id fermentum lorem. Ut est lorem, fringilla at accumsan nec, euismod at
nunc. Aenean mattis sollicitudin mattis. Nullam pulvinar vestibulum bibendum.
Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
himenaeos. Fusce nulla purus, gravida ac interdum ut, blandit eget ex. Duis a
luctus dolor.

Integer auctor massa maximus nulla scelerisque accumsan. *Aliquam ac malesuada*
ex. Pellentesque tortor magna, vulputate eu vulputate ut, venenatis ac lectus.
Praesent ut lacinia sem. Mauris a lectus eget felis mollis feugiat. Quisque
efficitur, mi ut semper pulvinar, urna urna blandit massa, eget tincidunt augue
nulla vitae est.

Ut posuere aliquet tincidunt. Aliquam erat volutpat. **Class aptent taciti**
sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi
arcu orci, gravida eget aliquam eu, suscipit et ante. Morbi vulputate metus vel
ipsum finibus, ut dapibus massa feugiat. Vestibulum vel lobortis libero. Sed
tincidunt tellus et viverra scelerisque. Pellentesque tincidunt cursus felis.
Sed in egestas erat.

Aliquam pulvinar interdum massa, vel ullamcorper ante consectetur eu. Vestibulum
lacinia ac enim vel placerat. Integer pulvinar magna nec dui malesuada, nec
congue nisl dictum. Donec mollis nisl tortor, at congue erat consequat a. Nam
tempus elit porta, blandit elit vel, viverra lorem. Sed sit amet tellus
tincidunt, faucibus nisl in, aliquet libero.
MARKDOWN;
    }

    private function getPhrases()
    {
        return [
            'Lorem ipsum dolor sit amet consectetur adipiscing elit',
            'Pellentesque vitae velit ex',
            'Mauris dapibus risus quis suscipit vulputate',
            'Eros diam egestas libero eu vulputate risus',
            'In hac habitasse platea dictumst',
            'Morbi tempus commodo mattis',
            'Ut suscipit posuere justo at vulputate',
            'Ut eleifend mauris et risus ultrices egestas',
            'Aliquam sodales odio id eleifend tristique',
            'Urna nisl sollicitudin id varius orci quam id turpis',
            'Nulla porta lobortis ligula vel egestas',
            'Curabitur aliquam euismod dolor non ornare',
            'Sed varius a risus eget aliquam',
            'Nunc viverra elit ac laoreet suscipit',
            'Pellentesque et sapien pulvinar consectetur',
        ];
    }

    private function getRandomPostTitle()
    {
        $titles = $this->getPhrases();

        return $titles[array_rand($titles)];
    }

    private function getRandomPostSummary($maxLength = 255)
    {
        $phrases = $this->getPhrases();

        $numPhrases = mt_rand(6, 12);
        shuffle($phrases);

        return substr(implode(' ', array_slice($phrases, 0, $numPhrases-1)), 0, $maxLength);
    }

    private function getRandomCommentContent()
    {
        $phrases = $this->getPhrases();

        $numPhrases = mt_rand(2, 15);
        shuffle($phrases);

        return implode(' ', array_slice($phrases, 0, $numPhrases-1));
    }
}
