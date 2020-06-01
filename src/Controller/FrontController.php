<?php

namespace App\Controller;

use App\Entity\Course;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Translation\TranslationInterface;


class FrontController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('front/index.html.twig');
        
    }

    /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        return $this->render('front/about.html.twig');
    }



    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, \Swift_Mailer $mailer)
    {
        $form=$this->createForm(ContactType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $contact= $form->getData();

            //tu wysyslam email
            //dd($contact);
            $message = (new \Swift_Message('New contact'))
            ->setFrom($contact['email'])
            ->setTo('anna.laskowska@hotmail.com')
            ->setBody($this->renderView(
                'emails/contact.html.twig', compact('contact')


            ),
            'text/html'
        );
        $mailer-> send($message);
        $this->addFlash('message', 'Message has been sent');
        return $this->redirectToRoute('index');
        
        }
        return $this->render('front/contact.html.twig', [
            'contactForm'=> $form->createView()
        ]);
    }

      /**
     * @Route("/search-results/{page}", methods={"GET"}, defaults={"page": "1"}, name="search_results")
     */
    public function searchResults($page, Request $request)
    {
        $courses = null;
        $query = null;

        if($query = $request->get('query'))
        {
            $courses = $this->getDoctrine()
            ->getRepository(Course::class)
            ->findByLanguage($query, $page, $request->get('sortby'));
            if(!$courses->getItems()) $courses = null;
        }

        return $this->render('display/search_results.html.twig',[
            'courses' => $courses,
            'query' => $query,
        ]);
    }


}
