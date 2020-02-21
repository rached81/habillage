<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    /**
     * @Route("/security", name="security")
     */
    public function index()
    {
        return $this->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }

    /**
     * @Route("/inscription", name= "security_registration")
     */
    public function registration(){
        $user =  new User();
        $form = $this->createForm(RegistrationType::class, $user);
        return $this->render('security/registration.html.twig', [ 'form' => $form->createView()]);

    }
}
