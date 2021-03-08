<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpClient\HttpClient;

class MoviesController extends AbstractController
{
    /**
     * @Route("/movies", name="movies")
     */
    public function getMovies(): Response
    {
        $httpClient = HttpClient::create();
        $queryResponse = $httpClient->request('GET','https://api.themoviedb.org/3/movie/top_rated?api_key=73335406cba0f2d2b6be748d34df365b&language=en-US&page=1');
        // $data = json_decode();
        

        $content = $queryResponse->getContent();

        $movies = json_decode($content);
        // $data = json_decode();
          dump($content);
        // foreach ($movies) {
        //     $movie = new Movie();
        //     $movie = setTitle($movies['title']);
        //     $em->persist($movie);
        //     $em->flush();
        // }
        
        return $this->json([$movies]);
    }
}
