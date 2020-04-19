<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Course;
use App\Form\CourseFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


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
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository(User::class);

        $currentUser = $this->getUser();
        
        $profil = $rep->find($currentUser->getId());
   
        $vars = ['profil' => $profil];
        return $this->render('admin/my_profile.html.twig', $vars);

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
