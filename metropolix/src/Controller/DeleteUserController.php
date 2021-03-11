<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class DeleteUserController extends AbstractController
{
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
}
