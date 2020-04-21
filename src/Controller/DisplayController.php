<?php

namespace App\Controller;

use App\Entity\Level;
use App\Entity\Course;
use App\Entity\Approach;
use App\Entity\Language;
use App\Repository\CourseRepository;
use Symfony\Component\HttpFoundation\Request;
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

            $courses = $this->getDoctrine()->getRepository(Course::class)->findAllPaginated($page);
            
           
            $levels = $rep2->findAll();
            $languages = $rep3->findAll();
            $approachs = $rep4->findAll();

            $vars = ['courses' => $courses, 'levels' => $levels, 'languages'=>$languages, 'approachs'=>$approachs];
            return $this->render("display/courses.html.twig",$vars);
    }

  

    /**
     * @Route("/display/course/{course}", name="display-course")
     */
    public function displayCourse (CourseRepository $repo, $course){
        
      /*   $entityManager = $this->getDoctrine()->getManager();
       
        $rep = $entityManager->getRepository(Course::class);
        
       
        $course = $rep->findOneBy (array('namecourse'=>'Elementary English'));
        
        // on stocke le résultat dans un array associatif 
        // pour l'envoyer à la vue comme d'habitude
        $vars = ['course'=> $course];
        
        // on renvoie l'objet à la vue, rien ne change ici
        return $this->render ("/display/course_details.html.twig", $vars); */
        dump($repo -> courseDetails($course));

        return $this->render ("/display/course_details.html.twig",
    ['course'=>$repo->courseDetails($course)]);
    }

   

}
