<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Psr\Cache\CacheItemPoolInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    /**
    *@Route("/", name="app_homepage")
    */

    public function homepage()
    {
        return $this->render('article/homepage.html.twig');
    }

    /**
    *@Route("/news/{slug}", name="article_show")
    */

    public function show($slug, MarkdownParserInterface $markdown, CacheItemPoolInterface $cache)
    {
        $comments = [
            'whats the meaning of life dude?',
            'have you ever considered jumping around like a kangaroo?',
            'maaaan, youre so meeeeeean'
        ];

        $articleContent = <<<EOF
Lorem ipsum dolor sit amet, **consectetur** adipisicing elit, sed do [eiusmod](https://lego.com) tempor incididunt ut **labore** et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
EOF;

        $item = $cache->getItem('markdown_'.md5($articleContent));
        if(!$item->isHit()) {
            $item->set($markdown->transform($articleContent));
            $cache->save($item);
        }

        $articleContent = $item->get();


        return $this->render('article/show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'articleContent' => $articleContent,
            'slug' => $slug,
            'comments' => $comments,
        ]);
    }

    /**
    *@Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
    */

    public function toggleArticleHeart($slug, LoggerInterface $logger)
    {
        //DATABASE DA FARE
        $random = array('hearts' => rand(5, 100));
        $logger -> info('articolo cuorato');

        return new Response(json_encode($random));
    }

}

?>
