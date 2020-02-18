<?php

namespace App\Controller;

use App\Entity\ConstraintType;
use App\Form\ConstraintTypeType;
use App\Repository\ConstraintTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/constraint/type")
 */
class ConstraintTypeController extends AbstractController
{
    /**
     * @Route("/", name="constraint_type_index", methods={"GET"})
     */
    public function index(ConstraintTypeRepository $constraintTypeRepository): Response
    {
        return $this->render('constraint_type/index.html.twig', [
            'constraint_types' => $constraintTypeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="constraint_type_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $constraintType = new ConstraintType();
        $form = $this->createForm(ConstraintTypeType::class, $constraintType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($constraintType);
            $entityManager->flush();

            return $this->redirectToRoute('constraint_type_index');
        }

        return $this->render('constraint_type/new.html.twig', [
            'constraint_type' => $constraintType,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="constraint_type_show", methods={"GET"})
     */
    public function show(ConstraintType $constraintType): Response
    {
        return $this->render('constraint_type/show.html.twig', [
            'constraint_type' => $constraintType,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="constraint_type_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ConstraintType $constraintType): Response
    {
        $form = $this->createForm(ConstraintTypeType::class, $constraintType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('constraint_type_index');
        }

        return $this->render('constraint_type/edit.html.twig', [
            'constraint_type' => $constraintType,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="constraint_type_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ConstraintType $constraintType): Response
    {
        if ($this->isCsrfTokenValid('delete'.$constraintType->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($constraintType);
            $entityManager->flush();
        }

        return $this->redirectToRoute('constraint_type_index');
    }
}
