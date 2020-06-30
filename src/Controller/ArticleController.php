<?php

namespace App\Controller;

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

    public function show($slug)
    {
        $comments = [
            'whats the meaning of life dude?',
            'have you ever considered jumping around like a kangaroo?',
            'maaaan, youre so meeeeeean'
        ];


        return $this->render('article/show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'comments' => $comments,
        ]);
    }
}

 ?>
