<?php

namespace App\Controller;

use App\Entity\Level;
use App\Entity\Course;
use App\Entity\Comment;
use App\Entity\Approach;
use App\Entity\Language;
use App\Repository\CourseRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

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
        

        return $this->render ("/display/course_details.html.twig",
    ['course'=>$repo->courseDetails($course)]);
    }




    
  /**
     * @Route("/display/order-line/{course}", name="order_line")
     */
    public function displayOrderLine (CourseRepository $repo, $course){
        

      return $this->render ("/display/order_line.html.twig",
  ['course'=>$repo->orderLine($course)]);
  }




    /**
     * @Route("/display/new-comment/{course}", methods={"POST"}, name="new_comment")
     */
    public function newComment(Course $course, Request $request)
     {
      $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');

      if ( !empty( trim($request->request->get('comment'))))
      {
        $comment = new Comment();
        $comment->setDescription($request->request->get('comment'));
        $comment->setUserComment($this->getUser());
        $comment->setDate(new \DateTime());
        $comment->setCourse($course);

        $em = $this->getDoctrine()->getManager();
        $em->persist($comment);
        $em->flush();
        

      }

      return $this->redirectToRoute('display-course',['course'=>$course->getId()]);

    }
    




    /**
     * @Route("/display/delete-comment/{comment}", name="delete_comment")
     * @Security("user.getId() == comment.getUserComment().getId()")
     */

     /* public function deleteComment(Comment $comment, Request $request)
     {
       $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');

       $em = $this->getDoctrine()->getManager();
       $em->remove($comment);
       $em->flush();

       return $this->redirectToRoute('display');
    }
 */
     }







   


