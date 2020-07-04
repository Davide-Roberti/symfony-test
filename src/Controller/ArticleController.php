<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Psr\Cache\CacheItemPoolInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Article;

class ArticleController extends AbstractController
{
    /**
    *@Route("/", name="app_homepage")
    */

    public function homepage(EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Article::class);
        $articles = $repository->findAllPublishedOrderedByNewest([], ['publishedAt' => 'DESC']);
        return $this->render('article/homepage.html.twig',
        [
            'articles' => $articles,
        ]
    );
    }

    /**
    *@Route("/news/{slug}", name="article_show")
    */

    public function show(Article $article, CacheItemPoolInterface $cache)
    {

        // $repository = $em->getRepository(Article::class);
        // /** @var Article $article */
        // $article = $repository->findOneBy(['slug' => $slug]);
        // if(!$article) {
        //     throw $this->createNotFoundException(sprintf('nessun articolo con slug "%s"', $slug));
        // }


        $comments = [
            'whats the meaning of life dude?',
            'have you ever considered jumping around like a kangaroo?',
            'maaaan, youre so meeeeeean'
        ];


        // $item = $cache->getItem('markdown_'.md5($articleContent));
        // if(!$item->isHit()) {
        //     $item->set($markdown->transform($articleContent));
        //     $cache->save($item);
        // }
        //
        // $articleContent = $item->get();


        return $this->render('article/show.html.twig', [
            'article' => $article,
            'comments' => $comments,
        ]);
    }

    /**
    *@Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
    */

    public function toggleArticleHeart(Article $article, LoggerInterface $logger, EntityManagerInterface $em)
    {
        $article->incrementHeartCount();
        $random = array('hearts' => $article->getHeartCount());
        $em->flush();

        $logger -> info('articolo cuorato');

        return new Response(json_encode($random));
    }

}

?>
