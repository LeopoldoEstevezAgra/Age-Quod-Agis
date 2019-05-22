<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use AppBundle\Form\UserType;

use AppBundle\Entity\User;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        if ($this->getUser() != null) {
            return $this->redirectToRoute('journalIndex');
        }
        // replace this example code with whatever you need
        return $this->render('public/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/register",name="register")
     */

    public function newUserAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {

        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $user->setUsername($user->getUsername());

            $user->setRoles(array('ROLE_USER'));

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();


            return $this->redirectToRoute('homepage');
        }
        return $this->render('public/accessControl/register.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/login/",name="login")
     */

    public function loginUserAction(Request $request, AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('public/accessControl/login.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error
        ));
    }
}
