<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $str_movies = file_get_contents(__DIR__.'/movie.json');
        $array_movies = json_decode($str_movies, true);

        foreach ($array_movies as $item){
            $movie = new Movie();
            $movie->setTitle($item['Film']);
            $movie->setGenre($item['Genre']);
            $movie->setStudio($item['Lead Studio']);
            $movie->setGross($item['Worldwide Gross']);
            $movie->setProfit($item['Profitability']);
            $movie->setRotten($item['Rotten Tomatoes %']);
            $movie->setYear($item['Year']);
            $movie->setScore($item['Audience score %']);
            $manager->persist($movie);

        }
        $manager->flush();
    }
}
