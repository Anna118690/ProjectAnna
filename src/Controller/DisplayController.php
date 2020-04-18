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
     * @Route("/display", name="display")
     */
    public function display()
    {
        
            $entityManager = $this->getDoctrine()->getManager();
            $rep = $entityManager->getRepository(Course::class);    
            $rep2= $entityManager->getRepository(Level::class);
            $rep3= $entityManager->getRepository(Language::class);
            $rep4= $entityManager->getRepository(Approach::class);


            $courses = $rep->findAll();
            $levels = $rep2->findAll();
            $languages = $rep3->findAll();
            $approachs = $rep4->findAll();

            $vars = ['courses' => $courses, 'levels' => $levels, 'languages'=>$languages, 'approachs'=>$approachs];
            return $this->render("display/courses.html.twig",$vars);
    }
}
