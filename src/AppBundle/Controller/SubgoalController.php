<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

use AppBundle\Entity\Subgoal;
use AppBundle\Entity\Goal;
use AppBundle\Form\SubgoalType;
/**
 * Sub controller
 * 
 * @Route("/subgoals")
 */
class SubgoalController extends Controller
{
	/**
	 * @Route("/{id}",name="journal_subgoal_index", methods={"GET","POST"})
	 */

	public function indexAction(Request $request,Goal $goal)
	{
        $subgoal = new Subgoal();
        $subgoalForm = $this->createForm(SubgoalType::class,$subgoal);

        $subgoalForm->handleRequest($request);

        if ($subgoalForm->isSubmitted() && $subgoalForm->isValid()) {
            $subgoal->setGoal($goal);
            $subgoal->setComplete(false);

            $em = $this->getDoctrine()->getManager();
            $em->persist($subgoal);
            $em->flush();
            return $this->redirectToRoute('journal_subgoal_index',array(
                'id' => $goal->getId()
            ));
        }

		return $this->render('public/journal/subgoals/index.html.twig', array(
			'goal' => $goal,
            'form'=> $subgoalForm->createView(),

		));
	}

    /**
     * Deletes a Subgoal entity.
     *
     * @Route("/{id}/delete", name="journal_subgoal_delete")
     */
    public function deleteSubgoalAction(Request $request, Subgoal $subgoal)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($subgoal);
        $em->flush();
        return $this->redirectToRoute('journal_subgoal_index',array(
            'id'=> $subgoal->getGoal()->getId(),

        ));

    }

    /**
     * Sets a Subgoal to finish.
     * 
     * @Route("/{id}/finish", name="journal_subgoal_finish")
     * @Method({"GET", "POST"})
     */
    public function finishSubgoalAction(Request $request, Subgoal $subgoal)
    {
        $em = $this->getDoctrine()->getManager();
        $subgoal->setComplete(true);
        $em->flush();

        return $this->redirectToRoute('journal_subgoal_index',array(
            'id'=> $subgoal->getGoal()->getId(),

        ));

    }
    
    /**
     * Sets a Subgoal to notfinish.
     * 
     * @Route("/{id}/resume", name="journal_subgoal_resume")
     * @Method({"GET", "POST"})
     */
    public function resumeSubgoalAction(Request $request, Subgoal $subgoal)
    {
        $em = $this->getDoctrine()->getManager();
        $subgoal->setComplete(false);
        $em->flush();

        return $this->redirectToRoute('journal_subgoal_index',array(
            'id'=> $subgoal->getGoal()->getId(),

        ));
    }

    /**
     * Deletes a Subgoal entity.
     *
     * @Route("/{id}/deleteog", name="journal_subgoal_ongoal_delete")
     */
    public function deleteSubgoalonGoalsAction(Request $request, Subgoal $subgoal)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($subgoal);
        $em->flush();
        return $this->redirectToRoute('journal_goal_index');
    }

    /**
     * Sets a Subgoal to finish.
     * 
     * @Route("/{id}/finishog", name="journal_subgoal_ongoal_finish")
     * @Method({"GET", "POST"})
     */
    public function finishSubgoalOnGoalsAction(Request $request, Subgoal $subgoal)
    {
        $em = $this->getDoctrine()->getManager();
        $subgoal->setComplete(true);
        $em->flush();

        return $this->redirectToRoute('journal_goal_index');
    }
    
    /**
     * Sets a Subgoal to notfinish.
     * 
     * @Route("/{id}/resumeog", name="journal_subgoal_ongoal_resume")
     * @Method({"GET", "POST"})
     */
    public function resumeSubgoaOnGoalslAction(Request $request, Subgoal $subgoal)
    {
        $em = $this->getDoctrine()->getManager();
        $subgoal->setComplete(false);
        $em->flush();

        return $this->redirectToRoute('journal_goal_index');
    }
}
