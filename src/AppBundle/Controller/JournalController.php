<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use AppBundle\Form\UserType;

use AppBundle\Entity\User;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use AppBundle\Entity\MonthTask;
use AppBundle\Entity\DayTask;
use AppBundle\Form\MonthTaskType;
use AppBundle\Form\DayTaskType;

class JournalController extends Controller
{
    /**
     * @Route("index",name="journalIndex")
     * @Method("GET")
     */
    public function indexTasksAction(Request $request)
    {
        $monthTask = new MonthTask();
        $dayTask = new DayTask();
        $formMonth = $this->createForm(MonthTaskType::class, $monthTask);
        $formDay = $this->createForm(DayTaskType::class, $dayTask);

        $formMonth->handleRequest($request);
        $formDay->handleRequest($request);

        $em = $this->getDoctrine()->getManager();



        $userMonthTaskRepository = $this->getDoctrine()->getRepository(MonthTask::class);
        $userMonthTasks = $userMonthTaskRepository->findByUser($this->getUser()->getId());
        $em->flush();

        $userDayTaskRepository = $this->getDoctrine()->getRepository(DayTask::class);
        $userDayTasks = $userDayTaskRepository->getThisMonthsTasks($this->getUser()->getId(),4);
        $em->flush();

        if ($formMonth->isSubmitted() && $formMonth->isValid()) {
            $user = $this->getUser();
            $monthTask->setUser($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($monthTask);
            $em->flush();
            return $this->redirectToRoute('journalIndex');
        }
        if ($formDay->isSubmitted() && $formDay->isValid()) {
            $user = $this->getUser();
            $dayTask->setUser($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($dayTask);
            $em->flush();
            return $this->redirectToRoute('journalIndex');
        }

        return $this->render('journal/index.html.twig', [
            'formMonth' => $formMonth->createView(),
            'formDay' => $formDay->createView(),
            'monthTasks' => $userMonthTasks,
            'dayTasks' => $userDayTasks,
        ]);
    }
}
