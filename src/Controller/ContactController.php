<?php

namespace App\Controller;

use App\Classe\Mail;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/nous-contacter", name="contact")
     */
    public function index(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('notice', 'Merci de nous avoir contacter. Notre équipe va vous répondre dans les meilleurs délais.');

            $this->entityManager->flush();

            $mail = new Mail();
            $content = $form->get('prenom')->getData().' '.$form->get('nom')->getData().', à essayer de vous contacter <br><small>Email :</small> '.$form->get('email')->getData().'<br> <small>Voici son message :</small> '.$form->get('content')->getData();
            $mail->send('philippe.nguyen86@gmail.com', 'La Boutique Française', 'Nouvelle demande de contact', $content);
        }

        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
