<?php

namespace App\Controller;

use App\Entity\ContactUs;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactUsType;
use Doctrine\ORM\EntityManagerInterface;

class ContactUsController extends AbstractController
{
    #[Route('/contact/us', name: 'app_contact_us')]
    public function index(Request $request, EntityManagerInterface $manager): Response
    {
        $contact = new ContactUs();



        $form = $this->createForm(ContactUsType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            $manager->persist($contact);
            $manager->flush();
            return $this->redirectToRoute('app_contact_us');
            $this->addFlash(
                'success',
                'Nous vous rapellerons dans 11jours!'
            );
        }


        return $this->render('contact_us\index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
