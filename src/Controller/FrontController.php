<?php

namespace App\Controller;

use App\Entity\Course;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('front/index.html.twig');
        
    }

    /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        return $this->render('front/about.html.twig');
    }

    /**
     * @Route("/cart", name="cart")
     */
    public function cart()
    {
        return $this->render('front/cart.html.twig');
    }

     /**
     * @Route("/checkout", name="checkout")
     */
    public function checkout()
    {
        return $this->render('front/checkout.html.twig');
    }

     /**
     * @Route("/shopsingle", name="shopsingle")
     */
    public function shopsingle()
    {
        return $this->render('front/shop-single.html.twig');
    }

    /**
     * @Route("/shop", name="shop")
     */
    public function shop()
    {
        return $this->render('front/shop.html.twig');
    }

    /**
     * @Route("/thankyou", name="thankyou")
     */
    public function thankyou()
    {
        return $this->render('front/thankyou.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('front/contact.html.twig');
    }

     /**
     * @Route("/search-results/{page}", methods={"GET"}, defaults={"page": "1"}, name="search_results")
     */
    public function searchResults($page, Request $request)
    {
        $courses = null;
        $query = null;

        if($query = $request->get('query'))
        {
            $courses = $this->getDoctrine()
            ->getRepository(Course::class)
            ->findByLanguage($query, $page, $request->get('sortby'));
            if(!$courses->getItems()) $courses = null;
        }

        return $this->render('display/search_results.html.twig',[
            'courses' => $courses,
            'query' => $query,
        ]);
}
}
