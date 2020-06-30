<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    /**
    *@Route("/")
    */

    public function homepage()
    {
        return new Response('bellaaaaaaaa');
    }

    /**
    *@Route("/news/{slug}")
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
