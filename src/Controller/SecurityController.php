<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use App\Repository\DistrictRepository;
use App\Repository\ProfilRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="admin.security.login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        /*
         * // BAD - $user->getRoles() will not know about the role hierarchy
            $hasAccess = in_array('ROLE_ADMIN', $user->getRoles());
            // GOOD - use of the normal security methods
            $hasAccess = $this->isGranted('ROLE_ADMIN');
            $this->denyAccessUnlessGranted('ROLE_ADMIN');
         */

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    /**
     * @Route("/admin/index", name="admin.security.index")
     */
    public function index(UserRepository $userRepository, ProfilRepository $profilRepository, DistrictRepository $districtRepository): Response
    {

        $users =   $userRepository->findAll();
        return $this->render('security/index.html.twig', ['users' => $users]);
    }


    /**
     * @Route("/logout", name="admin.security.logout")
     */
    public function logout()
    {
        return $this->render('security/login.html.twig');
    }
    /**
     * @Route("/inscription", name= "security_registration")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function registration(Request $request, EntityManagerInterface $entityManager, UserPasswordEncoderInterface $encoder){
        dump($request);
//        die;
        $user =  new User();
        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);
//        dd($user);

        if($form->isSubmitted() && $form->isValid()){
            $passwordEncoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($passwordEncoded);
            //on active par défaut
            //$user->setIsActive(true);
            /*
             * [▼
                  0 => "ROLE_USER"
                  1 => "ROLE_EDITOR"
                  2 => "ROLE_ADMIN"
                ]
             */
            $user->addRole("ROLE_USER");
            $user->addRole("ROLE_ADMIN");
            dump($user);
            $entityManager->persist($user);
            $entityManager->flush();
            $this->addFlash('success', "Utilisateur créé avec succès");
        }
        return $this->render('security/registration.html.twig', [ 'form' => $form->createView()]);

    }
}
