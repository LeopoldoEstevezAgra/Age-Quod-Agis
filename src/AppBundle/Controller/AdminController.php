<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/admin")
     */
class AdminController extends Controller
{
    /**
     * @Route("/", home")
     */
    /* public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('front/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    } */
}
