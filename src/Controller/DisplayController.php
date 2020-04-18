<?php

namespace App\Controller;

use App\Entity\Course;
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
            $courses = $rep->findAll();
            $vars = ['courses' => $courses]; 
            return $this->render("display/courses.html.twig",$vars);
    }
}
