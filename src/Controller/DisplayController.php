<?php

namespace App\Controller;


use App\Entity\Course;
use App\Entity\Comment;
use App\Data\SearchData;
use App\Form\SearchForm;
use App\Entity\Ordercourse;
use App\Entity\Reservation;
use App\Repository\CourseRepository;
use App\Repository\ReservationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class DisplayController extends AbstractController
{

    /**
     * @Route("/display", defaults={"page" : "1"}, name="display")
     */
    public function display(Request $request)
    {
      $data = new SearchData();
      $data->page = $request->get('page', 1);
      $form = $this->createForm(SearchForm::class, $data);
      $form->handleRequest($request);
      $courses = $this->getDoctrine()->getRepository(Course::class)->findSearch($data);
            
      
      return $this->render("display/courses.html.twig", [
        'courses' => $courses,
        'form' => $form->CreateView()
       
    ]);
    }


  

    /**
     * @Route("/display/course/{course}", name="display-course")
     */
    public function displayCourse (CourseRepository $repo, $course){
        

        return $this->render ("/display/course_details.html.twig",
    ['course'=> $repo -> courseDetails($course) ]);
    }


     /**
     * @Route("/display/summary/{reservation}", name="display-summary")
     */
    public function displaySummary (ReservationRepository $repo, $reservation){
      $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');

      return $this->render ("/display/summary.html.twig",
      ['reservation' => $repo -> reservationDetails($reservation) ]);
  }

    /**
     * @Route("/display/ordercourse/{reservation}", name="display-ordercourse")
     */
    public function displayOrdercourse (ReservationRepository $repo, Reservation $reservation){
      $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');

      $ordercourse = new Ordercourse();
      $ordercourse->setStudent($this->getUser());
      $ordercourse->setReservation($reservation);
      $ordercourse->setCreatedat(new \DateTime());
      $ordercourse->setTotal($reservation->getCourse()->getPriceActualHour());
      
      $em = $this->getDoctrine()->getManager();
      $em->persist($ordercourse);
      $em->flush();

      return $this->render ("/display/payment.html.twig",
      ['reservation' => $repo -> reservationDetails($reservation), 'ordercourse' => $ordercourse ]);
     
  }

  /**
   * @Route("/display/myordered", name="display-myordered")
   */

   public function displayMyordered() {

    $entityManager = $this->getDoctrine()->getManager();    
    $rep = $entityManager->getRepository(Ordercourse::class);
    $ordercourses = $rep->findBy(array('student'=>$this->getuser()->getId())); 

    return $this->render('admin/myordered.html.twig',['ordercourses' => $ordercourses,  'student'=>$this->getUser()]);
   }



/**
   * @Route("/display/mycomments", name="display-mycomments")
   */

  public function displayMycomments() {

    $entityManager = $this->getDoctrine()->getManager();    
    $rep = $entityManager->getRepository(Comment::class);
    $comments = $rep->findBy(array('userComment'=>$this->getuser()->getId())); 

    return $this->render('admin/mycomments.html.twig',['comments' => $comments,  'userComment'=>$this->getUser()]);
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

       public function deleteComment(Comment $comment, Request $request)
     {
       $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');

       $em = $this->getDoctrine()->getManager();
       $em->remove($comment);
       $em->flush();

       return $this->redirect($request->headers->get('display-course'));
      } 


    /**
     * @Route("/display/delete-my-comment/{id}", name="delete_my_comment")
     */
    public function deleteMyComment($id)
    {
      $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository(Comment::class);
        $Comment=$rep->find($id);
        $em->remove($Comment);
        $em->flush();
        return $this->redirectToRoute('display-mycomments'); 
    }

  
  }







   


