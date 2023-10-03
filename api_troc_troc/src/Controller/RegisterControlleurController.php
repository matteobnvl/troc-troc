<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
//ajout
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterControlleurController extends AbstractController
{
    #[Route('/register/controlleur', name: 'app_register_controlleur')]
    public function index(): Response
    {
        return $this->render('register_controlleur/index.html.twig', [
            'controller_name' => 'RegisterControlleurController',
        ]);
    }
     /**
     * @Route("/register", name="register", methods={"POST"})
     * 
     */

     public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder): Reponse
     {
        $data = json_decode($request->getContent(), true);
        $user = new User();
        $form = $this->createForm(UserType::class, $user);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            //Hashage pwd
            $user->setPassword($passwordEncoder->encodePassword($user, $user->getPassword()));

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();


            return new JsonResponse(['status' => 'User created!'], Response::HTTP_CREATED);
        }
/*
        $user->setEmail($data['email']);
        $user->setRoles($data['roles']);
        $user->setPassword($passwordEncoder->encodePassword($user, $data['password']));
        $user->setFirstName($data['firstname']);
        $user->setLastName($data['lastname']);
        $user->setSexe($data['sexe']);
        $user->setBirthday($data['birthday']);
        $user->setStreetNumber($data['street_number']);
        $user->setStreetName($data['street_name']);
        $user->setPostalCode($data['postal_code']);
        $user->setCity($data['city']);
        $user->setLongitude($data['longitude']);
        $user->setLatittude($data['lattitude']);

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
*/
        return $this->render('register_controlleur/index.html.twig', 
        [
            'controller_name' => 'RegisterControlleurController',
            'form' => $form->createView(),
        ]);

     }
}

