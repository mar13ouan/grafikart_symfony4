<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PropertyRepository;

class HomeController extends AbstractController
{
 
    /**
     * @Route ("/", name="home")
     * @param \App\Repository\PropertyRepository $repository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(PropertyRepository $repository): Response
    {
        
        $properties=$repository->findLatest();
        return $this->render('pages/home.html.twig',
         ['properties' => $properties]);

    }
}