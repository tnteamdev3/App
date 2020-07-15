<?php

namespace App\Controller;

use App\Entity\Fond;
use App\Form\FondType;
use App\Repository\FondRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fond")
 */
class FondController extends AbstractController
{
    /**
     * @Route("/", name="fond_index", methods={"GET"})
     */
    public function index(FondRepository $fondRepository): Response
    {
        return $this->render('fond/index.html.twig', [
            'fonds' => $fondRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="fond_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $fond = new Fond();
        $form = $this->createForm(Fond1Type::class, $fond);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fond);
            $entityManager->flush();

            return $this->redirectToRoute('fond_index');
        }

        return $this->render('fond/new.html.twig', [
            'fond' => $fond,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fond_show", methods={"GET"})
     */
    public function show(Fond $fond): Response
    {
        return $this->render('fond/show.html.twig', [
            'fond' => $fond,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="fond_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Fond $fond): Response
    {
        $form = $this->createForm(Fond1Type::class, $fond);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fond_index');
        }

        return $this->render('fond/edit.html.twig', [
            'fond' => $fond,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fond_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Fond $fond): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fond->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fond);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fond_index');
    }
}
