<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

use AppBundle\Entity\DayUnit;
use AppBundle\Form\DayUnitType;
/**
 * DayUnit controller
 * 
 * @Route("/activityLog")
 */
class ActivityLogController extends Controller
{
	/**
	 * @Route("/",name="journal_activityLog_index")
     * @Method("GET")
	 */

	public function indexAction(Request $request)
	{

        $dayUnit = new DayUnit();

        $currentMonth = (new \DateTime())->format('m');
        $currentYear = (new \DateTime())->format('Y');
        $dayUnit->setMonthAt($currentMonth);
        $dayUnit->setYearAt($currentYear);

        $form= $this->createForm(DayUnitType::class,$dayUnit);
        $dayUnitRepository= $this->getDoctrine()->getRepository(DayUnit::class);
        $maxHourId = $dayUnitRepository->getLastHourId(
            $this->getUser()->getId(),
            $currentMonth,
            $currentYear
        );

        $maxHourId = (int)$maxHourId[0]['hourId'];

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $dayUnit->setUser($this->getUser());

            for($i = 1; $i <= $dayUnit->getAmount(); $i++){
                $temp = clone $dayUnit;
                $em = $this->getDoctrine()->getManager();
                $temp->setHourId($maxHourId + $i);
                $em->persist($temp);
                $em->flush();
            }

			return $this->redirectToRoute('journal_activityLog_index');
        }

        return $this->render('public/journal/activityLog/index.html.twig',
            array(
                'dayUnit'=>$dayUnit,
                'form'=>$form->createView(),
            ));
    }
}
