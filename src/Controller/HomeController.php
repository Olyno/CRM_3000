<?php

namespace App\Controller;

use App\Repository\CustomerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(CustomerRepository $customerRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'user' => $this->getUser(),
            'customers' => $customerRepository->findAll()
        ]);
    }
}
