<?php

namespace App\Controller;

use App\Entity\Level;
use App\Entity\Course;
use App\Entity\Approach;
use App\Entity\Language;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DisplayController extends AbstractController
{

    /**
     * @Route("/display{page}", defaults={"page" : "1"}, name="display")
     */
    public function display($page)
    {
        
            $entityManager = $this->getDoctrine()->getManager();
                
            $rep2= $entityManager->getRepository(Level::class);
            $rep3= $entityManager->getRepository(Language::class);
            $rep4= $entityManager->getRepository(Approach::class);

            $courses = $this->getDoctrine()
            ->getRepository(Course::class)
            ->findAllPaginated($page);
           
            $levels = $rep2->findAll();
            $languages = $rep3->findAll();
            $approachs = $rep4->findAll();

            $vars = ['courses' => $courses, 'levels' => $levels, 'languages'=>$languages, 'approachs'=>$approachs];
            return $this->render("display/courses.html.twig",$vars);
    }

    /**
     * @Route("/display/course", name="display-course")
     */
    public function displayCourse (){
        // obtenir le entity manager
        $entityManager = $this->getDoctrine()->getManager();
        // obtenir le repository
        $rep = $entityManager->getRepository(Course::class);
        
        // on obtient l'objet, le filtre est envoyé sous la forme d'un array
        $course = $rep->findOneBy (array('namecourse'=>'Elementary English'));
        
        // on stocke le résultat dans un array associatif 
        // pour l'envoyer à la vue comme d'habitude
        $vars = ['course'=> $course];
        
        // on renvoie l'objet à la vue, rien ne change ici
        return $this->render ("/display/course.html.twig", $vars);
    }

}
