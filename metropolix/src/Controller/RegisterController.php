<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
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
}
