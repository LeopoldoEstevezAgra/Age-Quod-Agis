<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use AppBundle\Entity\Transaction;
use AppBundle\Form\TransactionType;

/**
 * Transaction controller
 * 
 * @Route("/transactions")
 */

class TransactionController extends Controller
{
	/**
	 * @Route("/",name="journal_transactions_index", methods={"GET","POST"})
	 */
	public function indexAction(Request $request)
	{
		$transaction = new Transaction();
		$transactionRepository = $this->getDoctrine()->getRepository(Transaction::class);
		$currentMonth = (new \DateTime())->format('m');
		$currentYear = (new \DateTime())->format('Y');

		$transactions = $transactionRepository->findTranByUserAndMonth($currentMonth, $currentYear, $this->getUser()->getId());
		$sumPositiveAmounts = $transactionRepository->findTotalPositiveAmount($currentMonth, $currentYear, $this->getUser()->getId());
		$sumNegativeAmounts = $transactionRepository->findTotalNegativeAmount($currentMonth, $currentYear, $this->getUser()->getId());

		$sumPositiveAmounts = $sumPositiveAmounts[0][1];
		$sumNegativeAmounts = $sumNegativeAmounts[0][1];

		$form = $this->createForm(TransactionType::class, $transaction);

		$form->handleRequest($request);

		$em = $this->getdoctrine()->getManager();

		if ($form->isSubmitted() && $form->isValid()) {
			$transaction->setUser($this->getUser());

			if ($transaction->getAmount() != 0) {
				$em->persist($transaction);
				$em->flush();
			}
			return $this->redirectToRoute('journal_transactions_index');
		}

		return $this->render('public/journal/transactions/index.html.twig', array(
			'form' => $form->createView(),
			'transactions' => $transactions,
			'negativeTotal' => $sumNegativeAmounts,
			'positiveTotal' => $sumPositiveAmounts

		));
	}

	/**
	 * Displays a form to edit an existing transaction entity.
	 * 
	 * @Route("/{id}/edit", name="journal_transaction_edit")
	 * @Method({"GET", "POST"})
	 */
	public function editAction(Request $request, Transaction $transaction)
	{
		$em = $this->getDoctrine()->getEntityManager();


		$editForm = $this->createForm('AppBundle\Form\TransactionType', $transaction, array(
			'user' => $this->getUser()->getId(),

		));
		$editForm->handleRequest($request);

		if ($editForm->isSubmitted() && $editForm->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($transaction);
			$em->flush();

			return $this->redirectToRoute('journal_transactions_index');
		}

		return $this->render('public/journal/transactions/edit.html.twig', array(
			'transaction' => $transaction,
			'form' => $editForm->createView(),
		));
	}


	/**
	 * Deletes a transaction entity.
	 *
	 * @Route("/{id}/delete", name="journal_transaction_delete")
	 */
	public function deleteAction(Request $request, Transaction $transaction)
	{

		$form = $this->createDeleteForm($transaction);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->remove($transaction);
			$em->flush();
			return $this->redirectToRoute('journal_transactions_index');
		}

		return $this->render('public/journal/transactions/delete.html.twig', array(
			'transaction' => $transaction,
			'form' => $form->createView(),
		));
	}

	/**
	 * Creates a form to delete a hito entity.
	 *
	 * @param Transaction $transaction The transaction entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm(Transaction $transaction)
	{
		return $this->createFormBuilder()
			->setAction($this->generateUrl('journal_transaction_delete', array('id' => $transaction->getId())))
			->setMethod('DELETE')
			->getForm();
	}
}
