<?php

namespace App\Controller;

use App\Entity\Networks;
use App\Form\NetworksType;
use App\Repository\NetworksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/networks")
 */
class NetworksController extends AbstractController
{
    /**
     * @Route("/", name="networks_index", methods={"GET"})
     */
    public function index(NetworksRepository $networksRepository): Response
    {
        return $this->render('networks/index.html.twig', [
            'networks' => $networksRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="networks_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $network = new Networks();
        $form = $this->createForm(NetworksType::class, $network);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($network);
            $entityManager->flush();

            return $this->redirectToRoute('networks_index');
        }

        return $this->render('networks/new.html.twig', [
            'network' => $network,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="networks_show", methods={"GET"})
     */
    public function show(Networks $network): Response
    {
        dump($network);
        return $this->render('networks/show.html.twig', [
            'network' => $network,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="networks_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Networks $network): Response
    {
        $form = $this->createForm(NetworksType::class, $network);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('networks_index');
        }

        return $this->render('networks/edit.html.twig', [
            'network' => $network,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="networks_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Networks $network): Response
    {
        if ($this->isCsrfTokenValid('delete'.$network->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($network);
            $entityManager->flush();
        }

        return $this->redirectToRoute('networks_index');
    }
}
