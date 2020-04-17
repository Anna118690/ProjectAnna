<?php

namespace App\Controller;

use App\Entity\Course;
use App\Form\CourseFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/add", name="add")
     */
    public function add(Request $request)
    {
        $course = new Course();
        $courseForm = $this->createForm(
            CourseFormType::class,
            $course,
            [
                'action' => $this->generateUrl('add'),
                'method' => 'POST'
            ]
        );
        $courseForm->handleRequest($request);
        if ($courseForm->isSubmitted() && $courseForm->isValid()) {
            $file= $course->getCoursePhoto();
            $fileNameServer = md5(uniqid()) . "." . $file->guessExtension();
            $file ->move ('filesCourse', $fileNameServer);  
            $course->setCoursePhoto( $fileNameServer);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($course);
            $entityManager->flush();
            return new Response("Course added");
        }
        else {
            return $this->render(
                '/admin/add.html.twig',
                ['courseForm' => $courseForm->createView()]
            );
            
        }
    }
}
