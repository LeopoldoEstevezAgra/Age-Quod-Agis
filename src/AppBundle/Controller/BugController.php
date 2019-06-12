<?php

namespace AppBundle\Controller;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use AppBundle\Entity\User;
use AppBundle\Entity\Bug;

/**
 * Bugs controller.
 *
 * @Route("/bugs")
 */
class BugController extends Controller
{

	/**
	 * @Route("/",name="journal_bug_index", methods={"GET","POST"})
	 */

	public function indexAction(Request $request)
	{
        $this->denyAccessUnlessGranted(['ROLE_ADMIN']);

		$bugRepository = $this->getDoctrine()->getRepository(Bug::class);


        $bugs = $bugRepository->findAll();

        return $this->render('public/journal/bugReport/adminIndex.html.twig', array(
			'bugs' => $bugs,

		));
	}
    /**
     * @Route("/new",name="journal_bug_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getentityManager();
        $bug = new Bug();

        $form = $this -> createForm('AppBundle\Form\BugType',$bug,array(
            'user'=> $this->getUser()->getId(),
        ));

		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
            $bug->setDateAt(new \DateTime());
			$em->persist($bug);
			$em->flush();

			return $this->redirectToRoute('journalIndex');
		}

		return $this->render('public/journal/bugReport/new.html.twig', array(
			'bug' => $bug,
			'form' => $form->createView(),
		));

    }
}
