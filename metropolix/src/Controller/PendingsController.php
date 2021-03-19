<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use \App\Repository\MoviesRepository;

class PendingsController extends AbstractController
{
    /**
     * @Route("/addPendings/{id}", name="addPendings")
     */
    public function addPending($id, MoviesRepository $repo,  EntityManagerInterface $em): Response
    {
        $movie= [];
        $movieEntity = $repo->find($id);
        $user = $this->getUser();
        $user->addPending($movieEntity); 

        $em->persist($user);
        $em->flush();
        return $this->json($movie);
    }

    /**
     * @Route("/getPendings", name="getPendings")
     */
    public function getPending(): Response
    {
        $movies= [];
        $user = $this->getUser();
        $pendings = $user->getPendings(); 
        foreach($pendings as $pending) {
            $movie = [];
            $movie['id'] = $pending->getId();
            $movie['title'] = $pending->getTitle();
            $movie['poster_path'] = $pending->getPosterPath();
            
            $movies[] = $movie;          
        }
        return $this->json($movies);
    }

    /**
     * @Route("/removePending/{id}", name="removePending")
     */
    public function removePending($id, MoviesRepository $repo,  EntityManagerInterface $em): Response
    {
        $movies= [];
        $movieEntity = $repo->find($id);
        $user = $this->getUser();
        $user->removePending($movieEntity); 

        $em->persist($user);
        $em->flush();
        $pendings = $user->getPendings();
        foreach($pendings as $pending) {
            $movie = [];
            $movie['id'] = $pending->getId();
            $movie['title'] = $pending->getTitle();
            $movie['poster_path'] = $pending->getPosterPath();
          
            $movies[] = $movie;          
        }
        return $this->json($movies);
    }
}
