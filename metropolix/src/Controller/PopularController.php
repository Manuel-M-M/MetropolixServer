<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use \App\Repository\MoviesRepository;

class PopularController extends AbstractController
{
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
}
