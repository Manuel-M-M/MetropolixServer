<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use \App\Repository\MoviesRepository;

class SeensController extends AbstractController
{
     /**
     * @Route("/addSeens/{id}", name="addSeens")
     */
    public function addFavourite($id, MoviesRepository $repo,  EntityManagerInterface $em): Response
    {
        $movie= [];
        $movieEntity = $repo->find($id);
        $user = $this->getUser();
        $user->addSeen($movieEntity); 

        $em->persist($user);
        $em->flush();
        return $this->json($movie);
    }

    /**
     * @Route("/getSeens", name="getSeens")
     */
    public function getSeen(): Response
    {
        $movies= [];
        $user = $this->getUser();
        $seens = $user->getSeens(); 
        foreach($seens as $seen) {
            $movie = [];
            $movie['id'] = $seen->getId();
            $movie['title'] = $seen->getTitle();
            $movie['poster_path'] = $seen->getPosterPath();
            
            $movies[] = $movie;          
        }
        return $this->json($movies);
    }

    /**
     * @Route("/removeSeens/{id}", name="removeSeens")
     */
    public function removeSeen($id, MoviesRepository $repo,  EntityManagerInterface $em): Response
    {
        $movies= [];
        $movieEntity = $repo->find($id);
        $user = $this->getUser();
        $user->removeSeen($movieEntity); 

        $em->persist($user);
        $em->flush();

        $seens = $user->getSeens();
        foreach($seens as $seen) {
            $movie = [];
            $movie['id'] = $seen->getId();
            $movie['title'] = $seen->getTitle();
            $movie['poster_path'] = $seen->getPosterPath();
          
            $movies[] = $movie;          
        }
        return $this->json($movies);

    }
}
