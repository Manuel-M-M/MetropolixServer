<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Repository\UserRepository;
use \App\Repository\MoviesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function register(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $encoder): Response
    {
        $username = $request->request->get('username');
        $email = $request->request->get('email');
        $password = $request->request->get('password');
        $confirm = $request->request->get('confirm');


        $user = new User();
        $user->setUsername($username);
        $user->setEmail($email);
        $encoded = $encoder->encodePassword($user, $password);

        $user->setPassword($encoded);

        if ($password === $confirm) {
            $em->persist($user);
            $em->flush();
        } else {
             return $this->json("Password don't match");
        }

        return $this->json("Register done");
    }

    /**
     * @Route("/deleteUser", name="curso_delete", methods={"DELETE"})
     */
    public function delete(EntityManagerInterface $em): Response
    {
        $user = $this->getUser();

        $em->remove($user);
        $em->flush();
        
        return $this->json('Borrado ok');
    }

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
        $movies= [];
        $movieEntity = $repo->find($id);
        $user = $this->getUser();
        $user->removeFavourite($movieEntity); 

        $em->persist($user);
        $em->flush();

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
