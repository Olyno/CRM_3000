<?php

namespace App\Controller;

use App\Entity\Compagny;
use App\Form\CompagnyType;
use App\Repository\CompagnyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/compagny')]
class CompagnyController extends AbstractController
{
    #[Route('/', name: 'home', methods: ['GET'])]
    public function index(CompagnyRepository $compagnyRepository): Response
    {
        return $this->render('compagny/index.html.twig', [
            'compagnies' => $compagnyRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'compagny_new', methods: ['GET','POST'])]
    public function new(Request $request): Response
    {
        $compagny = new Compagny();
        $form = $this->createForm(CompagnyType::class, $compagny);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($compagny);
            $entityManager->flush();

            return $this->redirectToRoute('home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('compagny/new.html.twig', [
            'compagny' => $compagny,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'compagny_show', methods: ['GET'])]
    public function show(Compagny $compagny): Response
    {
        return $this->render('compagny/show.html.twig', [
            'compagny' => $compagny,
        ]);
    }

    #[Route('/{id}/edit', name: 'compagny_edit', methods: ['GET','POST'])]
    public function edit(Request $request, Compagny $compagny): Response
    {
        $form = $this->createForm(CompagnyType::class, $compagny);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('compagny/edit.html.twig', [
            'compagny' => $compagny,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'compagny_delete', methods: ['POST'])]
    public function delete(Request $request, Compagny $compagny): Response
    {
        if ($this->isCsrfTokenValid('delete'.$compagny->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($compagny);
            $entityManager->flush();
        }

        return $this->redirectToRoute('home', [], Response::HTTP_SEE_OTHER);
    }
}
