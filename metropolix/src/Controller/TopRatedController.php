<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use \App\Repository\MoviesRepository;

class TopRatedController extends AbstractController
{
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
