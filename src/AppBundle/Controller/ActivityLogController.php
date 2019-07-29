<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
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

        $daysinmonth = cal_days_in_month(
            CAL_GREGORIAN, 
            $currentMonth,
            $currentYear
        );

        
        $maxHourMonth = 24 * $daysinmonth;
        
        $form= $this->createForm(DayUnitType::class,$dayUnit);
        $dayUnitRepository= $this->getDoctrine()->getRepository(DayUnit::class);

        $monthUnits = $dayUnitRepository->getMonthUnits(
            $this->getUser()->getId(),
            $currentMonth,
            $currentYear
        );

        
        $maxHourId = $dayUnitRepository->getLastHourId(
            $this->getUser()->getId(),
            $currentMonth,
            $currentYear
        );


        $maxHourId = (int)$maxHourId[0]['hourId'];
        $hoursAvailable = $maxHourMonth - $maxHourId;

        $form->handleRequest($request);

        if($request->isXmlHttpRequest()){
            $dayUnitAmount = $request->request->get('dayUnitAmount');
            $dayUnitType= $request->request->get('dayUnitType');

            /*
            $dayUnit = new DayUnit();
             */

            $dayUnit->setUser($this->getUser());
            $dayUnit->setAmount($dayUnitAmount);
            $dayUnit->setType($dayUnitType);

            if($dayUnit->getAmount() > $hoursAvailable){
                $dayUnit->setAmount($hoursAvailable);
            }
            if($dayUnit->getAmount() == 0 ){
                return $this->redirectToRoute('journal_activityLog_index');
            }

            $dayUnit->setUser($this->getUser());
            switch($dayUnit->getType()){
            case 'sleeping':
                $dayUnit->setColor('gray');
                break;
            case 'general':
                $dayUnit->setColor('green');
                break;
            case 'personalWork':
                $dayUnit->setColor('lightblue');
                break;
            case 'study':
                $dayUnit->setColor('blue');
                break;
            case 'work':
                $dayUnit->setColor('navy');
                break;
            case 'procrastination':
                $dayUnit->setColor('silver');
                break;
            case 'wasted':
                $dayUnit->setColor('black');
                break;
            case 'reading':
                $dayUnit->setColor('lime');
                break;
            case 'social':
                $dayUnit->setColor('purple');
                break;
            case 'unmarked':
                $dayUnit->setColor('#EFEFEF');
                break;
            default:
                $dayUnit->setcolor('white');
            }

            for($i = 1; $i <= $dayUnit->getAmount(); $i++){
                $temp = clone $dayUnit;
                $em = $this->getDoctrine()->getManager();
                $temp->setHourId($maxHourId + $i);
                $em->persist($temp);
                $em->flush();
            }

            $jsonData = array(
                'html' => $this->renderView(
                    'public/journal/activityLog/index.html.twig',
                    [
                        'dayUnit'=>$dayUnit,
                        'form'=>$form->createView(),
                        'units' => $monthUnits
                    ]
                )
            );
            return new JsonResponse($jsonData);



        }elseif($form->isSubmitted() && $form->isValid()){
            if($dayUnit->getAmount() > $hoursAvailable){
                $dayUnit->setAmount($hoursAvailable);
            }
            if($dayUnit->getAmount() == 0 ){
                return $this->redirectToRoute('journal_activityLog_index');
            }

            $dayUnit->setUser($this->getUser());
            switch($dayUnit->getType()){
            case 'sleeping':
                $dayUnit->setColor('gray');
                break;
            case 'general':
                $dayUnit->setColor('green');
                break;
            case 'personalWork':
                $dayUnit->setColor('lightblue');
                break;
            case 'study':
                $dayUnit->setColor('blue');
                break;
            case 'work':
                $dayUnit->setColor('navy');
                break;
            case 'procrastination':
                $dayUnit->setColor('silver');
                break;
            case 'wasted':
                $dayUnit->setColor('black');
                break;
            case 'reading':
                $dayUnit->setColor('lime');
                break;
            case 'social':
                $dayUnit->setColor('purple');
                break;
            case 'unmarked':
                $dayUnit->setColor('#EFEFEF');
                break;
            default:
                $dayUnit->setcolor('white');
            }

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
                'units' => $monthUnits
            ));
    }
}
