<?php

namespace App\Controller;

use App\Entity\Course;
use App\Form\CourseFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


 /**
     * @Route("/admin")
     */

class AdminController extends AbstractController
{

     /**
     * @Route("/", name="admin_main_page")
     */
    public function adminProfile()
    {
        return $this->render('admin/my_profile.html.twig');
        
    }

    /**
     * @Route("/courses", name="courses")
     */
    public function courses()
    {
        return $this->render('admin/courses.html.twig');
        
    }

    /**
     * @Route("/users", name="users")
     */
    public function users()
    {
        return $this->render('admin/users.html.twig');
        
    }

      /**
     * @Route("/update", name="update")
     */
    public function update()
    {
        return $this->render('admin/update.html.twig');
        
    }

     /**
     * @Route("/delete", name="delete")
     */
    public function delete()
    {
        return $this->render('admin/delete.html.twig');
        
    }



    /**
     * @Route("/add", name="add")
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
