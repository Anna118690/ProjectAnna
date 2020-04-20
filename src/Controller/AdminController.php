<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Course;
use App\Form\CourseFormType;
use App\Form\RegistrationFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


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
     * @Route("/su/courses", name="courses")
     */
    public function courses()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $rep = $entityManager->getRepository(Course::class);
        
        $courses =  $rep->findAll();

        return $this->render('admin/courses.html.twig',['courses'=>$courses]);
        
        
    }

    /**
     * @Route("/su/users", name="users")
     */
    public function users()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $rep = $entityManager->getRepository(User::class);
        
        $users = $rep->findAll();

        return $this->render('admin/users.html.twig',['users'=>$users]);
    }

      /**
     * @Route("/update", name="update")
     */
    public function update(Request $req, UserPasswordEncoderInterface $passwordEncoder)
    {
        $userUpdated = $this->getUser();
        $userUpdated->setPhoto(null);
        $updateProfil = $this->createForm(
            RegistrationFormType::class,
            $userUpdated,
            [
                'method' => 'POST',
                'action' => $this->generateUrl("update")
            ] 
        );
       
        $updateProfil->handleRequest($req);
      
         if ($updateProfil->isSubmitted() && $updateProfil->isValid())
        { 
            
            $em = $this->getDoctrine()->getManager();
            
            $userUpdated->setPassword(
            $passwordEncoder->encodePassword(
                $userUpdated,
                $updateProfil->get('plainPassword')->getData()
            )
            );
            $file = $userUpdated->getPhoto();
        
                $nameFileServer  = md5(uniqid()) . "." . $file->guessExtension();
                $file->move("files",  $nameFileServer );
    
                $userUpdated->setPhoto( $nameFileServer );
                $em->flush();
            
            $vars = ['profil' => $userUpdated];
            return $this->render('admin/my_profile.html.twig', $vars);
        }

        return $this->render('admin/update.html.twig',
        ['updateForm' => $updateProfil->createView()]
    );
        
    }

     /**
     * @Route("/delete", name="delete")
     */
    public function delete()
    {
        return $this->render('admin/delete.html.twig');
        
    }



    /**
     * @Route("/su/add", name="add")
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
