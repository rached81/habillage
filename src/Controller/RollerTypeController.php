<?php

namespace App\Controller;

use App\Entity\RollerType;
use App\Form\RollerTypeType;
use App\Repository\RollerTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/roller/type")
 */
class RollerTypeController extends AbstractController
{
    /**
     * @Route("/", name="roller_type_index", methods={"GET"})
     */
    public function index(RollerTypeRepository $rollerTypeRepository): Response
    {
        return $this->render('roller_type/index.html.twig', [
            'roller_types' => $rollerTypeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="roller_type_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $rollerType = new RollerType();
        $form = $this->createForm(RollerTypeType::class, $rollerType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rollerType);
            $entityManager->flush();

            return $this->redirectToRoute('roller_type_index');
        }

        return $this->render('roller_type/new.html.twig', [
            'roller_type' => $rollerType,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="roller_type_show", methods={"GET"})
     */
    public function show(RollerType $rollerType): Response
    {
        return $this->render('roller_type/show.html.twig', [
            'roller_type' => $rollerType,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="roller_type_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RollerType $rollerType): Response
    {
        $form = $this->createForm(RollerTypeType::class, $rollerType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('roller_type_index');
        }

        return $this->render('roller_type/edit.html.twig', [
            'roller_type' => $rollerType,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="roller_type_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RollerType $rollerType): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rollerType->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($rollerType);
            $entityManager->flush();
        }

        return $this->redirectToRoute('roller_type_index');
    }
}
