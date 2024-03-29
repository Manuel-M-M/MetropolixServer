<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpClient\HttpClient;
use \App\Entity\Movies;
use \App\Repository\MoviesRepository;

class MoviesController extends AbstractController
{
    /**
     * @Route("/movies", name="movies")
     */
    public function getMovies(EntityManagerInterface $em): Response
    {
        $httpClient = HttpClient::create();
        $queryResponse = $httpClient->request('GET','https://api.themoviedb.org/3/movie/top_rated?api_key=yourApiKey&language=en-US&page=10');
        
        $content = $queryResponse->getContent();

        $contentArray = json_decode($content);
        $movies = $contentArray->results;
        
         foreach ($movies as $m) {
             $movie = new Movies();
             $movie -> setTitle($m->title);
             $movie -> setOriginalLanguage($m->original_language);
             $movie -> setOverview($m->overview);
             $movie -> setPopularity($m->popularity);
             $movie -> setReleaseDate($m->release_date);
             $movie -> setVoteAverage($m->vote_average);
             $movie -> setVoteCount($m->vote_count);        
             $movie -> setPosterPath('https://image.tmdb.org/t/p/w300/' . $m->poster_path . '?api_key=yourApiKey&language=en-US');
             $movie -> setBackdropPath('https://image.tmdb.org/t/p/w300/' . $m->backdrop_path . '?api_key=yourApiKey&language=en-US');

        $tmdb_id = $m->id;
        $queryDetails = $httpClient->request('GET','https://api.themoviedb.org/3/movie/'. $tmdb_id  .'?api_key=yourApiKey&language=en-US');
        
        $details = $queryDetails->getContent();
        $details = json_decode($details);
        
        $movie -> setRuntime($details->runtime);
        
        $em->persist($movie);   
         }
        
        $em->flush();
        return $this->json([$movies]);
    }


    /**
     * @Route("/getMovies", name="getMovies")
     */
    public function index(MoviesRepository $repo, Request $request): Response
    {
        $movies = [];
        $page = $request->query->get('page');
        $moviesEntitys = $repo->findByPage($page);
        foreach($moviesEntitys as $movieEntity) {
            $movie = [];
            $movie['id'] = $movieEntity->getId();
            $movie['title'] = $movieEntity->getTitle();
            $movie['backdrop_path'] = $movieEntity->getBackdropPath();
            $movie['poster_path'] = $movieEntity->getPosterPath();
            $movie['original_language'] = $movieEntity->getOriginalLanguage();
            $movie['overview'] = $movieEntity->getOverview();
            $movie['popularity'] = $movieEntity->getPopularity();
            $movie['release_date'] = $movieEntity->getReleaseDate();
            $movie['video_path'] = $movieEntity->getVideoPath();
            $movie['vote_average'] = $movieEntity->getVoteAverage();
            $movie['vote_count'] = $movieEntity->getVoteCount();
            $movie['runtime'] = $movieEntity->getRuntime();
            $movie['origin_country'] = $movieEntity->getOriginCountry();
            $movie['director'] = $movieEntity->getDirector();
            $movie['writer'] = $movieEntity->getWriter();
            $movie['cast'] = $movieEntity->getCast();
            $movie['genre'] = $movieEntity->getGenre();

            $movies[] = $movie;
            
        }
        return $this->json($movies);
    }


    /**
     * @Route("/getDetails", name="getDetails")
     */
    public function details(MoviesRepository $repo, Request $request): Response
    {
        $details = [];
        $id = $request->query->get('id');
        $movieEntity = $repo->find($id);
    
            $movie = [];
            $movie['id'] = $movieEntity->getId();
            $movie['title'] = $movieEntity->getTitle();
            $movie['backdrop_path'] = $movieEntity->getBackdropPath();
            $movie['poster_path'] = $movieEntity->getPosterPath();
            $movie['original_language'] = $movieEntity->getOriginalLanguage();
            $movie['overview'] = $movieEntity->getOverview();
            $movie['popularity'] = $movieEntity->getPopularity();
            $movie['release_date'] = $movieEntity->getReleaseDate();
            $movie['video_path'] = $movieEntity->getVideoPath();
            $movie['vote_average'] = $movieEntity->getVoteAverage();
            $movie['vote_count'] = $movieEntity->getVoteCount();
            $movie['runtime'] = $movieEntity->getRuntime();
            $movie['origin_country'] = $movieEntity->getOriginCountry();
            $movie['director'] = $movieEntity->getDirector();
            $movie['writer'] = $movieEntity->getWriter();
            $movie['cast'] = $movieEntity->getCast();
            $movie['genre'] = $movieEntity->getGenre();
        
        return $this->json($movie);   
    }


    /**
     * @Route("/Search", name="Search")
     */
    public function search(MoviesRepository $repo, Request $request): Response
    {
        $movies = [];
        $title = $request->query->get('title');
        $moviesEntitys = $repo->searchByTitle($title);
        foreach($moviesEntitys as $movieEntity) {
            $movie = [];
            $movie['id'] = $movieEntity->getId();
            $movie['title'] = $movieEntity->getTitle();
            $movie['backdrop_path'] = $movieEntity->getBackdropPath();
            $movie['poster_path'] = $movieEntity->getPosterPath();
            $movie['original_language'] = $movieEntity->getOriginalLanguage();
            $movie['overview'] = $movieEntity->getOverview();
            $movie['popularity'] = $movieEntity->getPopularity();
            $movie['release_date'] = $movieEntity->getReleaseDate();
            $movie['video_path'] = $movieEntity->getVideoPath();
            $movie['vote_average'] = $movieEntity->getVoteAverage();
            $movie['vote_count'] = $movieEntity->getVoteCount();
            $movie['runtime'] = $movieEntity->getRuntime();
            $movie['origin_country'] = $movieEntity->getOriginCountry();
            $movie['director'] = $movieEntity->getDirector();
            $movie['writer'] = $movieEntity->getWriter();
            $movie['cast'] = $movieEntity->getCast();
            $movie['genre'] = $movieEntity->getGenre();

            $movies[] = $movie;
            
        }
        return $this->json($movies);
    }

    /**
     * @Route("/popular", name="popular")
     */
    public function index(MoviesRepository $repo): Response
    {
        $popularMovies = [];
        $moviesPopular = $repo->findTop20Popularity();
        foreach($moviesPopular as $moviePopular) {
            $popularMovie = [];
            $popularMovie['id'] = $moviePopular->getId();
            $popularMovie['title'] = $moviePopular->getTitle();
            $popularMovie['backdrop_path'] = $moviePopular->getBackdropPath();
            $popularMovie['poster_path'] = $moviePopular->getPosterPath();
            $popularMovie['original_language'] = $moviePopular->getOriginalLanguage();
            $popularMovie['overview'] = $moviePopular->getOverview();
            $popularMovie['popularity'] = $moviePopular->getPopularity();
            $popularMovie['release_date'] = $moviePopular->getReleaseDate();
            $popularMovie['video_path'] = $moviePopular->getVideoPath();
            $popularMovie['vote_average'] = $moviePopular->getVoteAverage();
            $popularMovie['vote_count'] = $moviePopular->getVoteCount();
            $popularMovie['runtime'] = $moviePopular->getRuntime();
            $popularMovie['origin_country'] = $moviePopular->getOriginCountry();
            $popularMovie['director'] = $moviePopular->getDirector();
            $popularMovie['writer'] = $moviePopular->getWriter();
            $popularMovie['cast'] = $moviePopular->getCast();
            $popularMovie['genre'] = $moviePopular->getGenre();

            $popularMovies[] = $popularMovie;
            
        }
        return $this->json($popularMovies);
    }

    /**
     * @Route("/topRated", name="topRated")
     */
    public function index(MoviesRepository $repo): Response
    {
        $topRatedMovies = [];
        $moviesTopRated = $repo->findTop20Popularity();
        foreach($moviesTopRated as $movieTopRated) {
            $topRatedMovie = [];
            $topRatedMovie['id'] = $movieTopRated->getId();
            $topRatedMovie['title'] = $movieTopRated->getTitle();
            $topRatedMovie['backdrop_path'] = $movieTopRated->getBackdropPath();
            $topRatedMovie['poster_path'] = $movieTopRated->getPosterPath();
            $topRatedMovie['original_language'] = $movieTopRated->getOriginalLanguage();
            $topRatedMovie['overview'] = $movieTopRated->getOverview();
            $topRatedMovie['popularity'] = $movieTopRated->getPopularity();
            $topRatedMovie['release_date'] = $movieTopRated->getReleaseDate();
            $topRatedMovie['video_path'] = $movieTopRated->getVideoPath();
            $topRatedMovie['vote_average'] = $movieTopRated->getVoteAverage();
            $topRatedMovie['vote_count'] = $movieTopRated->getVoteCount();
            $topRatedMovie['runtime'] = $movieTopRated->getRuntime();
            $topRatedMovie['origin_country'] = $movieTopRated->getOriginCountry();
            $topRatedMovie['director'] = $movieTopRated->getDirector();
            $topRatedMovie['writer'] = $movieTopRated->getWriter();
            $topRatedMovie['cast'] = $movieTopRated->getCast();
            $topRatedMovie['genre'] = $movieTopRated->getGenre();

            $topRatedMovies[] = $topRatedMovie;
            
        }
        return $this->json($topRatedMovies);
    }
}
