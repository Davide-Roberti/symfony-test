<?php

namespace App\DataFixtures;


use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;
use Faker\Factory;



class ArticleFixtures extends BaseFixture
{
    private static $articleTitles = [
        'what the world needs now?',
        'what a son of a preacher man',
        'senorita feel the conga, let me see you move like you come from Colombia'
    ];
    private static $articleImages = [
        'egg.png',
        'han-solo-darth-vader-ron-howard.jpg',
        'falcor.jpg'
    ];
    private static $articleAuthors = [
        'Davide Roberti',
        'Roberto Davidi',
    ];

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Article::class, 10, function(Article $article, $count) {

            $article->setTitle($this->faker->randomElement(self::$articleTitles));
            $article->setSlug($this->faker->slug);
            $article->setContent(<<<EOF
Lorem ipsum dolor sit amet, **consectetur** adipisicing elit, sed do [eiusmod](https://lego.com) tempor incididunt ut **labore** et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
EOF
);

            if($this->faker->boolean(70)) {
                $article->setPublishedAt($this->faker->dateTimeBetween('-100 days', '-1 days'));
            };

            $article->setAuthor($this->faker->randomElement(self::$articleAuthors));
            $article->setHeartCount($this->faker->numberBetween(5, 100));
            $article->setImageFilename($this->faker->randomElement(self::$articleImages));

         });
        $manager->flush();

    }
}
