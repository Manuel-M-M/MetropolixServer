<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use \App\Repository\MoviesRepository;

class FavouritesController extends AbstractController
{
    /**
     * @Route("/addFavourites/{id}", name="addFavourites")
     */
    public function addFavourite($id, MoviesRepository $repo,  EntityManagerInterface $em): Response
    {
        $movie= [];
        $movieEntity = $repo->find($id);
        $user = $this->getUser();
        $user->addFavourite($movieEntity); 

        $em->persist($user);
        $em->flush();
        return $this->json($movie);
    }

    /**
     * @Route("/getFavourites", name="getFavourites")
     */
    public function getFavourite(): Response
    {
        $movies= [];
        $user = $this->getUser();
        $favourites = $user->getFavourites(); 
        foreach($favourites as $favourite) {
            $movie = [];
            $movie['id'] = $favourite->getId();
            $movie['title'] = $favourite->getTitle();
            $movie['poster_path'] = $favourite->getPosterPath();
            
            $movies[] = $movie;          
        }
        return $this->json($movies);
    }

    /**
     * @Route("/removeFavourites/{id}", name="removeFavourites")
     */
    public function removeFavourite($id, MoviesRepository $repo,  EntityManagerInterface $em): Response
    {
        $movie= [];
        $movieEntity = $repo->find($id);
        $user = $this->getUser();
        $user->removeFavourite($movieEntity); 

        $em->persist($user);
        $em->flush();
        return $this->json($movie);
    }
}
