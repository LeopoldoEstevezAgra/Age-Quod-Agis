<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MonthTaskType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('description',TextType::class,[
				'label'=>false,
				'attr'=>[
					'max_length'=>35
				]
			])
			->add('submit',SubmitType::class,[
				'label'=>'Submit'
			])
			;

	}
}
