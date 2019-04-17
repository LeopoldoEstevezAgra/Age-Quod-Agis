<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use AppBundle\Form\UserType;

use AppBundle\Entity\User;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * @Route("/journal")
 */
class JournalController extends Controller
{ 
    /**
     * @Route("/index",name="journalIndex")
     */
    public function indexAction(Request $request){

        return $this->render('journal/base.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }

}
