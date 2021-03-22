<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Comments;
use \App\Repository\MoviesRepository;
use Doctrine\ORM\EntityManagerInterface;

class CoomentsController extends AbstractController
{
    /**
     * @Route("/addComments/{id}", name="cooments")
     */
    public function addComment($id, MoviesRepository $repo, EntityManagerInterface $em, Request $request): Response
    {
        $text = $request->request->get('text');
        $user = $this->getUser();
        $movie = $repo->find($id);
        $comments = new Comments();
        $comments->setText($text);
        $comments->setUser($user);
        $comments->setMovie($movie);
        $comments->setDate(new \DateTime());

        $em->persist($comments);
        $em->flush();

        return $this->json([]);
    }

    /**
     * @Route("/getComments/{id}", name="getComments")
     */
    public function getComent($id, MoviesRepository $repo): Response
    {
        $commentsArray= [];
        $movie = $repo->find($id);
        $comments = $movie->getComments(); 
        foreach($comments as $comment) {
            $commentArray = [];
            $commentArray['id'] = $comment->getId();
            $commentArray['text'] = $comment->getText();
            $commentArray['date'] = $comment->getDate()->format('Y-m-d');
            $commentArray['user'] = $comment->getUser()->getRealUsername();
            
            $commentsArray[] = $commentArray;          
        }
        return $this->json($commentsArray);
    }
}
