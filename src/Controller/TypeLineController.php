<?php

namespace App\Controller;

use App\Entity\TypeLine;
use App\Form\TypeLineType;
use App\Repository\TypeLineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/line")
 */
class TypeLineController extends AbstractController
{
    /**
     * @Route("/", name="type_line_index", methods={"GET"})
     */
    public function index(TypeLineRepository $typeLineRepository): Response
    {
        return $this->render('type_line/index.html.twig', [
            'type_lines' => $typeLineRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="type_line_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeLine = new TypeLine();
        $form = $this->createForm(TypeLineType::class, $typeLine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeLine);
            $entityManager->flush();

            return $this->redirectToRoute('type_line_index');
        }

        return $this->render('type_line/new.html.twig', [
            'type_line' => $typeLine,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_line_show", methods={"GET"})
     */
    public function show(TypeLine $typeLine): Response
    {
        return $this->render('type_line/show.html.twig', [
            'type_line' => $typeLine,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_line_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeLine $typeLine): Response
    {
        $form = $this->createForm(TypeLineType::class, $typeLine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_line_index');
        }

        return $this->render('type_line/edit.html.twig', [
            'type_line' => $typeLine,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_line_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TypeLine $typeLine): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeLine->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeLine);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_line_index');
    }
}
