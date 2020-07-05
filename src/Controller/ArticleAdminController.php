<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Article;

class ArticleAdminController extends AbstractController
{

    /**
    * @Route("/admin/article/new")
    */
    public function new(EntityManagerInterface $em) {

        die('todo');
//         $article = new Article();
//         $article->setTitle('How Did I Get Here');
//         $article->setSlug('how-did-i-get-here'.rand(100, 999));
//         $article->setContent(<<<EOF
// Lorem ipsum dolor sit amet, **consectetur** adipisicing elit, sed do [eiusmod](https://lego.com) tempor incididunt ut **labore** et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
// EOF
// );
//
//         if(rand(1, 10) > 2) {
//             $article->setPublishedAt(new \DateTime(sprintf('-%d days', rand(1, 100))));
//         }
//
//         $article->setAuthor('Davide Roberti')
//             ->setHeartCount(rand(5, 100))
//             ->setImageFilename('han-solo-darth-vader-ron-howard.jpg');
//
//         $em->persist($article);
//         $em->flush();

        return new Response(sprintf('article id: #%d slug %s', $article->getId(), $article->getSlug()));
    }

}


 ?>
