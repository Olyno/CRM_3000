<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

#[Route('/auth')]
class AuthController extends AbstractController
{

    #[Route('/signin', name: 'signin', methods: ['GET', 'POST'])]
    public function signin(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('auth/signin.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

}
