<?php

namespace App\Controller;

use App\Entity\TourProgram;
use App\Form\TourProgramType;
use App\Repository\TourProgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tour/program")
 */
class TourProgramController extends AbstractController
{
    /**
     * @Route("/", name="tour_program_index", methods={"GET"})
     */
    public function index(TourProgramRepository $tourProgramRepository): Response
    {
        return $this->render('tour_program/index.html.twig', [
            'tour_programs' => $tourProgramRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tour_program_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tourProgram = new TourProgram();
        dump($tourProgram);
        $form = $this->createForm(TourProgramType::class, $tourProgram);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tourProgram);
            $entityManager->flush();

            return $this->redirectToRoute('tour_program_index');
        }

        return $this->render('tour_program/new.html.twig', [
            'tour_program' => $tourProgram,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tour_program_show", methods={"GET"})
     */
    public function show(TourProgram $tourProgram): Response
    {
        return $this->render('tour_program/show.html.twig', [
            'tour_program' => $tourProgram,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tour_program_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TourProgram $tourProgram): Response
    {
        $form = $this->createForm(TourProgramType::class, $tourProgram);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tour_program_index');
        }

        return $this->render('tour_program/edit.html.twig', [
            'tour_program' => $tourProgram,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tour_program_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TourProgram $tourProgram): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tourProgram->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tourProgram);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tour_program_index');
    }
}
