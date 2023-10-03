<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends AbstractController
{
    #[Route('/api/register', name: 'app_register', methods:['POST'])]
     public function register(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager): JsonResponse
     {
        $data = json_decode($request->getContent(), true);
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);

        $form->submit($data);
         if ($form->isSubmitted() && $form->isValid())
        {
            $user->setPassword( $passwordHasher->hashPassword($user, $user->getPassword()));

            $entityManager->persist($user);
            $entityManager->flush();
        }
        return new JsonResponse(['status' => 'User created!'], Response::HTTP_CREATED);
     }
}
