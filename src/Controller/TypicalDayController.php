<?php

namespace App\Controller;

use App\Entity\TypicalDay;
use App\Form\TypicalDayType;
use App\Repository\TypicalDayRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/typical/day")
 */
class TypicalDayController extends AbstractController
{
    /**
     * @Route("/", name="typical_day_index", methods={"GET"})
     */
    public function index(TypicalDayRepository $typicalDayRepository): Response
    {
        return $this->render('typical_day/index.html.twig', [
            'typical_days' => $typicalDayRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="typical_day_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typicalDay = new TypicalDay();
        $form = $this->createForm(TypicalDayType::class, $typicalDay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typicalDay);
            $entityManager->flush();

            return $this->redirectToRoute('typical_day_index');
        }

        return $this->render('typical_day/new.html.twig', [
            'typical_day' => $typicalDay,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="typical_day_show", methods={"GET"})
     */
    public function show(TypicalDay $typicalDay): Response
    {
        return $this->render('typical_day/show.html.twig', [
            'typical_day' => $typicalDay,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="typical_day_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypicalDay $typicalDay): Response
    {
        $form = $this->createForm(TypicalDayType::class, $typicalDay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typical_day_index');
        }

        return $this->render('typical_day/edit.html.twig', [
            'typical_day' => $typicalDay,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="typical_day_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TypicalDay $typicalDay): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typicalDay->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typicalDay);
            $entityManager->flush();
        }

        return $this->redirectToRoute('typical_day_index');
    }
}
