<?php

namespace AppBundle\Controller;

use Symfony\Component\Form\Form;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use AppBundle\Entity\Goal;
use AppBundle\Form\GoalType;


/**
 * Goal controller
 * 
 * @Route("/goals")
 */
class GoalController extends Controller
{
	/**
	 * @Route("/",name="journal_goal_index", methods={"GET","POST"})
	 */

	public function indexAction(Request $request)
	{
		$goalRepository = $this->getDoctrine()->getRepository(Goal::class);

		$currentMonth = (new \DateTime())->format('m');
		$currentYear = (new \DateTime())->format('Y');

		$goals = $goalRepository->findGoalByUserAndMonth($currentMonth, $currentYear, $this->getUser()->getId());

		return $this->render('public/journal/goals/index.html.twig', array(
			'goals' => $goals,

		));
	}

	/**
	 * Displays a form to create a  goal entity.
	 * 
	 * @Route("/new", name="journal_goal_new")
	 * @Method({"GET", "POST"})
	 */
	public function newAction(Request $request)
	{
		$em = $this->getDoctrine()->getEntityManager();

		$goal = new Goal();

		$form = $this->createForm('AppBundle\Form\GoalType', $goal, array(
			'user' => $this->getUser()->getId(),

		));
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$goal->setUser($this->getUser());
			$em->persist($goal);
			$em->flush();

			return $this->redirectToRoute('journal_goal_index');
		}

		return $this->render('public/journal/goals/new.html.twig', array(
			'goal' => $goal,
			'form' => $form->createView(),
		));
	}
	/**
	 * Displays a form to edit an existing goal entity.
	 * 
	 * @Route("/{id}/edit", name="journal_goal_edit")
	 * @Method({"GET", "POST"})
	 */
	public function editAction(Request $request, Goal $goal)
	{
		$em = $this->getDoctrine()->getEntityManager();


		$editForm = $this->createForm('AppBundle\Form\GoalType', $goal, array(
			'user' => $this->getUser()->getId(),

		));
		$editForm->handleRequest($request);

		if ($editForm->isSubmitted() && $editForm->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($goal);
			$em->flush();

			return $this->redirectToRoute('journal_goal_index');
		}

		return $this->render('public/journal/goals/edit.html.twig', array(
			'goal' => $goal,
			'form' => $editForm->createView(),
		));
	}


	/**
	 * Deletes a goal entity.
	 *
	 * @Route("/{id}/delete", name="journal_goal_delete")
	 */
	public function deleteAction(Request $request, Goal $goal)
	{
		$em = $this->getDoctrine()->getManager();
		$em->remove($goal);
		$em->flush();
		return $this->redirectToRoute('journal_goal_index');
	}

    /**
     * Sets a goal to complete.
     * 
     * @Route("/{id}/complete", name="journal_goal_complete")
     * @Method({"GET", "POST"})
     */
    public function completeGoalAction(Request $request, Goal $goal)
    {
        $em = $this->getDoctrine()->getManager();
        $goal->setComplete(true);
        $em->flush();

        return $this->redirectToRoute('journal_goal_index');
    }

    /**
     * Sets a goal to not complete.
     * 
     * @Route("/{id}/resumemt", name="journal_goal_uncomplete")
     * @Method({"GET", "POST"})
     */
    public function compelteGoalAction(Request $request, Goal $goal)
    {
        $em = $this->getDoctrine()->getManager();
        $goal->setComplete(false);
        $em->flush();

        return $this->redirectToRoute('journal_goal_index');
    }
}
