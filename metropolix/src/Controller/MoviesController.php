<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpClient\HttpClient;
use \App\Entity\Movies;

class MoviesController extends AbstractController
{
    /**
     * @Route("/movies", name="movies")
     */
    public function getMovies(EntityManagerInterface $em): Response
    {
        $httpClient = HttpClient::create();
        $queryResponse = $httpClient->request('GET','https://api.themoviedb.org/3/movie/top_rated?api_key=73335406cba0f2d2b6be748d34df365b&language=en-US&page=10');
        // $data = json_decode();
        

        $content = $queryResponse->getContent();

        $contentArray = json_decode($content);
        $movies = $contentArray->results;
        // $data = json_decode();
          //dump($content);
         foreach ($movies as $m) {
           dump($movies);
             $movie = new Movies();
             $movie -> setTitle($m->title);
             $movie -> setOriginalLanguage($m->original_language);
             $movie -> setOverview($m->overview);
             $movie -> setPopularity($m->popularity);
             $movie -> setReleaseDate($m->release_date);
             $movie -> setVoteAverage($m->vote_average);
             $movie -> setVoteCount($m->vote_count);        
             $movie -> setPosterPath('https://image.tmdb.org/t/p/w300/' . $m->poster_path . '?api_key=73335406cba0f2d2b6be748d34df365b&language=en-US');
             $movie -> setBackdropPath('https://image.tmdb.org/t/p/w300/' . $m->backdrop_path . '?api_key=73335406cba0f2d2b6be748d34df365b&language=en-US');

        $tmdb_id = $m->id;
        $queryDetails = $httpClient->request('GET','https://api.themoviedb.org/3/movie/'. $tmdb_id  .'?api_key=73335406cba0f2d2b6be748d34df365b&language=en-US');
        //  = json_decode();
        
        $details = $queryDetails->getContent();
        $details = json_decode($details);
        dump($details);
        $movie -> setRuntime($details->runtime);
        //$movie -> setOriginCountry($details->origin_country);

        $em->persist($movie);
               
         }
        
        $em->flush();
        return $this->json([$movies]);
    }
}
