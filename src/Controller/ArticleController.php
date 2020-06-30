<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ArticleController
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
        return new Response(sprintf(
            'i am in an existencial crysis, %s',
            $slug
        ));
    }
}

 ?>
