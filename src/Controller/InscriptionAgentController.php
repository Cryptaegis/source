<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\InscriptionAgentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\ORM\EntityManagerInterface;


class InscriptionAgentController extends AbstractController
{

    #[Route('/{id}/account', name: 'inscription_agent')]

    public function edit(Request $request, Utilisateur $utilisateur, Session $session, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $doctrine,  $id): Response
    {
        $utilisateur = $this->getUser();
        $utilisateur = $doctrine->getRepository(Utilisateur::class)->find($id);
        // Verify if the current user has the right to modify the targeted user
        if ($id != $id ){
            // un utilisateur ne peut pas en modifier un autre
            $session->set("message", "Vous ne pouvez pas modifier cet utilisateur");
            return $this->redirectToRoute('membre');
        }
        $form = $this->createForm(InscriptionAgentType::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $utilisateur->setPassword($passwordHasher->hashPassword($utilisateur, $utilisateur->getPassword()));

            $doctrine->flush();
            return $this->redirectToRoute('utilisateur_index');
        }

        return $this->render('utilisateur/edit.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form->createView(),
        ]);
    } 
     
}
