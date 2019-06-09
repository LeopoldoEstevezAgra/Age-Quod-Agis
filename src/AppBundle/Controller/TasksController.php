<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use AppBundle\Entity\MonthTask;
use AppBundle\Entity\Event;
use AppBundle\Entity\DayTask;
use AppBundle\Form\MonthTaskType;
use AppBundle\Form\DayTaskType;

class TasksController extends Controller
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

        $currentMonth = (new \DateTime())->format('m');
        $currentYear = (new \DateTime())->format('Y');

        $formMonth->handleRequest($request);
        $formDay->handleRequest($request);

        $em = $this->getDoctrine()->getManager();



        $userMonthTaskRepository = $this->getDoctrine()->getRepository(MonthTask::class);
        $userMonthTasks = $userMonthTaskRepository->getThisMonthsTasks($this->getUser()->getId(), $currentMonth, $currentYear);

        $userDayTaskRepository = $this->getDoctrine()->getRepository(DayTask::class);
        $userDayTasks = $userDayTaskRepository->getThisMonthsTasks($this->getUser()->getId(), $currentMonth, $currentYear);

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

        return $this->render('public/journal/Tasks/index.html.twig', [
            'formMonth' => $formMonth->createView(),
            'formDay' => $formDay->createView(),
            'monthTasks' => $userMonthTasks,
            'dayTasks' => $userDayTasks,
        ]);
    }
    /**
     * Deletes a DayTask entity.
     *
     * @Route("/{id}/deletedt", name="journal_dtask_delete")
     */
    public function deleteDTaskAction(Request $request, DayTask $dayTask)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($dayTask);
        $em->flush();
        return $this->redirectToRoute('journalIndex');
    }

    /**
     * Deletes a MonthTask entity.
     *
     * @Route("/{id}/deletemt", name="journal_mtask_delete")
     */
    public function deleteMTaskAction(Request $request, MonthTask $monthTask)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($monthTask);
        $em->flush();
        return $this->redirectToRoute('journalIndex');
    }

    /**
     * Sets a dTask to finish.
     * 
     * @Route("/{id}/finishdt", name="journal_dtask_finish")
     * @Method({"GET", "POST"})
     */
    public function finishDayTaskAction(Request $request, DayTask $dayTask)
    {
        $em = $this->getDoctrine()->getManager();
        $dayTask->setFinished(true);
        $em->flush();

        return $this->redirectToRoute('journalIndex');
    }

    /**
     * Sets a dTask to not finish.
     * 
     * @Route("/{id}/resumedt", name="journal_dtask_resume")
     * @Method({"GET", "POST"})
     */
    public function resumeDayTaskAction(Request $request, DayTask $dayTask)
    {
        $em = $this->getDoctrine()->getManager();
        $dayTask->setFinished(false);
        $em->flush();

        return $this->redirectToRoute('journalIndex');
    }

    /**
     * Sets a mTask to finish.
     * 
     * @Route("/{id}/finishmt", name="journal_mtask_finish")
     * @Method({"GET", "POST"})
     */
    public function finishMonthTaskAction(Request $request, MonthTask $monthTask)
    {
        $em = $this->getDoctrine()->getManager();
        $monthTask->setFinished(true);
        $em->flush();

        return $this->redirectToRoute('journalIndex');
    }

    /**
     * Sets a mTask to not finish.
     * 
     * @Route("/{id}/resumemt", name="journal_mtask_resume")
     * @Method({"GET", "POST"})
     */
    public function resumeMonthTaskAction(Request $request, monthTask $monthTask)
    {
        $em = $this->getDoctrine()->getManager();
        $monthTask->setFinished(false);
        $em->flush();

        return $this->redirectToRoute('journalIndex');
    }
}
