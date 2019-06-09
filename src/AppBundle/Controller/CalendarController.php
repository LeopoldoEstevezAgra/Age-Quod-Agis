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

use AppBundle\Entity\Event;
use AppBundle\Entity\User;

/**
 * Event controller.
 *
 * @Route("/calendar")
 */
class CalendarController extends Controller
{
	/**
	 * Lists all Event entities.
	 *
	 * @Route("/", name="journal_event_index", methods={"GET"})
	 */
	public function indexAction(Request $request)
	{
		$em = $this->getDoctrine()->getManager();

		//$events = $em->getRepository('AppBundle:Event')->getEventsByUser($this->getUser());
	    $events = $em->getRepository('AppBundle:Event')->findAll();

		/*         foreach ($events as $key => $event) {
            if (!$this->isGranted('VIEW', $event)) {
                $events->remove($key);
            }
        } */

		if ($request->isXmlHttpRequest()) {
			$eventsArray = [];
			$eventsArray['success'] = 1;

			$colorToClass = [
				'red' => 'event-important',
				'blue' => 'event-info',
				'yellow' => 'event-warning',
				'black' => 'event-inverse',
				'green' => 'event-success',
				'purple' => 'event-special',
			];

			foreach ($events as $event) {
				$eventsArray['result'][] = [
					'id' => $event->getId(),
					'title' => $event->getTitle(),
					'start' => $event->getStarts()->getTimestamp() . '000',
					'end' => $event->getEnds() ? $event->getEnds()->getTimestamp() . '000' : $event->getStarts()->modify('+ 1 hour')->getTimestamp() . '000',
					'url' => $this->get('router')->generate('journal_event_edit', ['id' => $event->getId()]),
					'class' => $event->getColor() ? $colorToClass[$event->getColor()] : null,
				];
			}

			return new JsonResponse($eventsArray);
		} else {
			return $this->render('public/journal/Calendar/index.html.twig', array(
				'events' => $events,
			));
		}
	}


	/**
	 * Creates a new Event entity.
	 *
	 * @Route("/new", name="journal_event_new", methods={"GET", "POST"})
	 * @param Request $request
	 * @return RedirectResponse|Response
	 */
	public function newAction(Request $request)
	{
		$em = $this->getDoctrine()->getManager();

		$event = new Event();

		$form = $this->createForm('AppBundle\Form\EventType', $event, array(
			'user' => $this->getUser()->getId(),
		));
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$event->setUser($this->getUser());
			$em->persist($event);
			$em->flush();

			/*             $aces = $form->get('acl')->getData();
            $this->get('app.acl_service')->setAcesForEvent($event, $aces); */


			return $this->redirectToRoute('journal_event_index', array('id' => $event->getId()));
		} else {
			$users = $em->getRepository("AppBundle:User")->findAll();
		}

		return $this->render('public/journal/Calendar/new.html.twig', array(
			'event' => $event,
			'form' => $form->createView(),
			//'aclProjectSourceJson' => json_encode($projects),
			// 'aclUserSourceJson' => json_encode($users),
		));
	}

	/**
	 * Displays a form to edit an existing Event entity.
	 *
	 * @Route("/{id}/edit", name="journal_event_edit")
	 * @Method({"GET", "POST"})
	 * @param Request $request
	 * @param Event $event
	 * @return RedirectResponse|Response
	 */
	public function editAction(Request $request, Event $event)
	{
		$em = $this->getDoctrine()->getManager();

		// $this->denyAccessUnlessGranted('ROLE_MANAGE_EVENTS');


		$oEvent = new Event();
		$oEvent
			->setTitle($event->getTitle())
			->setStarts($event->getStarts());
		if ($event->getDescription()) {
			$oEvent->setDescription($event->getDescription());
		}
		if ($event->getEnds()) {
			$oEvent->setEnds($event->getEnds());
		}
		if ($event->getVenue()) {
			$oEvent->setVenue($event->getVenue());
		}

		$editForm = $this->createForm('AppBundle\Form\EventType', $event, array(
			'user' => $this->getUser()->getId(),
		));

		$editForm->handleRequest($request);

		if ($editForm->isSubmitted() && $editForm->isValid()) {
			$em->flush();

			// $aces = $editForm->get('acl')->getData();
			//$this->get('app.acl_service')->deleteEntityAces($event);
			// $this->get('app.acl_service')->setAcesForEvent($event, $aces);

			if (
				$event->getTitle() !== $oEvent->getTitle()
				|| $event->getDescription() !== $oEvent->getDescription()
				|| $event->getStarts() !== $oEvent->getStarts()
				|| $event->getEnds() !== $oEvent->getEnds()
				|| $event->getVenue() !== $oEvent->getVenue()
			) { }

			return $this->redirectToRoute('journal_event_index');
		} else {

			//$aces = $this->get('app.acl_service')->getEntityAces($event, []);
			//$formAces = $this->get('app.acl_service')->acesToFormData($aces);

		}

		return $this->render('public/journal/Calendar/edit.html.twig', array(
			'event' => $event,
			'form' => $editForm->createView(),
			//  'aclProjectSourceJson' => json_encode($projects),
			//  'aclUserSourceJson' => json_encode($users),
		));
	}

	/**
	 * Deletes a Event entity.
	 *
	 * @Route("/{id}/delete", name="journal_event_delete")
	 * @Method({"GET", "DELETE"})
	 *
	 * @param Request $request
	 * @param Event $event
	 *
	 * @return RedirectResponse|Response
	 */
	public function deleteAction(Request $request, Event $event)
	{
		// $this->denyAccessUnlessGranted('ROLE_MANAGE_EVENTS');

		/** @var Form $form */
		$form = $this->createFormBuilder()
			->setAction($this->generateUrl('journal_event_delete', array('id' => $event->getId())))
			->setMethod('DELETE')
			->getForm();

		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			//   $this->get('app.acl_service')->deleteEntityAces($event);
			$em = $this->getDoctrine()->getManager();
			$em->remove($event);
			$em->flush();

			return $this->redirectToRoute('journal_event_index');
		}

		return $this->render('public/journal/Calendar/delete.html.twig', array(
			'event' => $event,
			'form' => $form->createView(),
		));
	}
}
