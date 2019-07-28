<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
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
     * @Method({"GET","POST"})
     */
    public function indexTasksAction(Request $request)
    {

        $req = $request->request->get('day_task')['description'];

        $monthTask = new MonthTask();
        $formMonth = $this->createForm(MonthTaskType::class, $monthTask);

        $dayTask = new DayTask();
        $formDay = $this->createForm(DayTaskType::class, $dayTask);

        $currentMonth = (new \DateTime())->format('m');
        $currentYear = (new \DateTime())->format('Y');

        $formMonth->handleRequest($request);
        $formDay->handleRequest($request);

        $em = $this->getDoctrine()->getManager();



        $userMonthTaskRepository = $this->getDoctrine()->getRepository(MonthTask::class);

        $userMonthTasks = $userMonthTaskRepository->getThisMonthsTasks(
            $this->getUser()->getId(),
            $currentMonth,
            $currentYear);

        $userDayTaskRepository = $this->getDoctrine()->getRepository(DayTask::class);

        $userDayTasks = $userDayTaskRepository->getThisMonthsTasks(
            $this->getUser()->getId(), 
            $currentMonth, 
            $currentYear);

        if($request->isXmlHttpRequest()){
            $dataOrigin = $request->request->get('dataOrigin');
            if($dataOrigin == 'day'){
                $dayTaskRequest= new DayTask();
                $user = $this->getUser();
                $dayDescription = $request->request->get('inputValDay');
                $dayTaskRequest->setUser($user);

                $dayTaskRequest->setDescription(
                    $request->request->get('inputValDay')
                );

                if($dayDescription != '' && $dayDescription != null){
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($dayTaskRequest);
                    $em->flush();


                    $userDayTasks = $userDayTaskRepository->getThisMonthsTasks(
                        $this->getUser()->getId(), 
                        $currentMonth, 
                        $currentYear);

                    $jsonData = array(
                        'html' => $this->renderView(
                            'public/journal/Tasks/dayTasksCard.html.twig',
                            [
                                'formDay' => $formDay->createView(),
                                'dayTasks' => $userDayTasks,
                            ]
                        )
                    );
                }
            }elseif($dataOrigin == 'month'){
                $monthTaskRequest= new MonthTask();
                $user = $this->getUser();
                $monthDescription = $request->request->get('inputValMonth');
                $monthTaskRequest->setUser($user);

                $monthTaskRequest->setDescription(
                    $request->request->get('inputValMonth')
                );

                if($monthDescription != '' && $monthDescription != null){
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($monthTaskRequest);
                    $em->flush();

                }
                $userMonthTasks = $userMonthTaskRepository->getThisMonthsTasks(
                    $this->getUser()->getId(), 
                    $currentMonth, 
                    $currentYear);

                $jsonData = array(
                    'html' => $this->renderView(
                        'public/journal/Tasks/monthTasksCard.html.twig',
                        [
                            'formMonth' => $formMonth->createView(),
                            'monthTasks' => $userMonthTasks,
                        ]
                    )
                );
            }

            return new JsonResponse($jsonData);
        }else{
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
        if($request->isXmlHttpRequest()){

            $em = $this->getDoctrine()->getManager();
            $currentMonth = (new \DateTime())->format('m');
            $currentYear = (new \DateTime())->format('Y');

            $userDayTaskRepository = $this->getDoctrine()->getRepository(DayTask::class);

            $dayTask = new DayTask();
            $formDay = $this->createForm(DayTaskType::class, $dayTask);


            $id=$request->request->get('id');
            $dayTask = $userDayTaskRepository->find($id);
            $em->remove($dayTask);
            $em->flush();

            $userDayTasks = $userDayTaskRepository->getThisMonthsTasks(
                $this->getUser()->getId(), 
                $currentMonth, 
                $currentYear);

            $jsonData = array(
                'html' => $this->renderView(
                    'public/journal/Tasks/dayTasksCard.html.twig',
                    [
                        'formDay' => $formDay->createView(),
                        'dayTasks' => $userDayTasks,
                    ]
                )
            );
            return new JsonResponse($jsonData);

        }

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
        if($request->isXmlHttpRequest()){

            $em = $this->getDoctrine()->getManager();
            $currentMonth = (new \DateTime())->format('m');
            $currentYear = (new \DateTime())->format('Y');

            $userMonthTaskRepository = $this->getDoctrine()->getRepository(MonthTask::class);

            $monthTask = new MonthTask();
            $formMonth = $this->createForm(MonthTaskType::class, $monthTask);


            $id=$request->request->get('id');
            $monthTask = $userMonthTaskRepository->find($id);
            $em->remove($monthTask);
            $em->flush();

            $userMonthTasks = $userMonthTaskRepository->getThisMonthsTasks(
                $this->getUser()->getId(), 
                $currentMonth, 
                $currentYear);

            $jsonData = array(
                'html' => $this->renderView(
                    'public/journal/Tasks/monthTasksCard.html.twig',
                    [
                        'formMonth' => $formMonth->createView(),
                        'monthTasks' => $userMonthTasks,
                    ]
                )
            );
            return new JsonResponse($jsonData);
        }
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
        if($request->isXmlHttpRequest()){

            $em = $this->getDoctrine()->getManager();
            $currentMonth = (new \DateTime())->format('m');
            $currentYear = (new \DateTime())->format('Y');

            $userDayTaskRepository = $this->getDoctrine()->getRepository(DayTask::class);

            $dayTask = new DayTask();
            $formDay= $this->createForm(DayTaskType::class, $dayTask);


            $id=$request->request->get('id');
            $dayTask = $userDayTaskRepository->find($id);
            $dayTask->setFinished(true);
            $em->flush();

            $userDayTasks = $userDayTaskRepository->getThisMonthsTasks(
                $this->getUser()->getId(), 
                $currentMonth, 
                $currentYear);

            $jsonData = array(
                'html' => $this->renderView(
                    'public/journal/Tasks/dayTasksCard.html.twig',
                    [
                        'formDay' => $formDay->createView(),
                        'dayTasks' => $userDayTasks,
                    ]
                )
            );
            return new JsonResponse($jsonData);
        }

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
        if($request->isXmlHttpRequest()){

            $em = $this->getDoctrine()->getManager();
            $currentMonth = (new \DateTime())->format('m');
            $currentYear = (new \DateTime())->format('Y');

            $userDayTaskRepository = $this->getDoctrine()->getRepository(DayTask::class);

            $dayTask = new DayTask();
            $formDay= $this->createForm(DayTaskType::class, $dayTask);


            $id=$request->request->get('id');
            $dayTask = $userDayTaskRepository->find($id);
            $dayTask->setFinished(false);
            $em->flush();

            $userDayTasks = $userDayTaskRepository->getThisMonthsTasks(
                $this->getUser()->getId(), 
                $currentMonth, 
                $currentYear);

            $jsonData = array(
                'html' => $this->renderView(
                    'public/journal/Tasks/dayTasksCard.html.twig',
                    [
                        'formDay' => $formDay->createView(),
                        'dayTasks' => $userDayTasks,
                    ]
                )
            );
            return new JsonResponse($jsonData);
        }

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

        if($request->isXmlHttpRequest()){

            $em = $this->getDoctrine()->getManager();
            $currentMonth = (new \DateTime())->format('m');
            $currentYear = (new \DateTime())->format('Y');

            $userMonthTaskRepository = $this->getDoctrine()->getRepository(MonthTask::class);

            $monthTask = new MonthTask();
            $formMonth= $this->createForm(MonthTaskType::class, $monthTask);


            $id=$request->request->get('id');
            $monthTask = $userMonthTaskRepository->find($id);
            $monthTask->setFinished(true);
            $em->flush();

            $userMonthTasks = $userMonthTaskRepository->getThisMonthsTasks(
                $this->getUser()->getId(), 
                $currentMonth, 
                $currentYear);

            $jsonData = array(
                'html' => $this->renderView(
                    'public/journal/Tasks/monthTasksCard.html.twig',
                    [
                        'formMonth' => $formMonth->createView(),
                        'monthTasks' => $userMonthTasks,
                    ]
                )
            );
            return new JsonResponse($jsonData);
        }
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
        if($request->isXmlHttpRequest()){

            $em = $this->getDoctrine()->getManager();
            $currentMonth = (new \DateTime())->format('m');
            $currentYear = (new \DateTime())->format('Y');

            $userMonthTaskRepository = $this->getDoctrine()->getRepository(MonthTask::class);

            $monthTask = new MonthTask();
            $formMonth= $this->createForm(MonthTaskType::class, $monthTask);


            $id=$request->request->get('id');
            $monthTask = $userMonthTaskRepository->find($id);
            $monthTask->setFinished(false);
            $em->flush();

            $userMonthTasks = $userMonthTaskRepository->getThisMonthsTasks(
                $this->getUser()->getId(), 
                $currentMonth, 
                $currentYear);

            $jsonData = array(
                'html' => $this->renderView(
                    'public/journal/Tasks/monthTasksCard.html.twig',
                    [
                        'formMonth' => $formMonth->createView(),
                        'monthTasks' => $userMonthTasks,
                    ]
                )
            );
            return new JsonResponse($jsonData);
        }

        $em = $this->getDoctrine()->getManager();
        $monthTask->setFinished(false);
        $em->flush();

        return $this->redirectToRoute('journalIndex');
    }

}
