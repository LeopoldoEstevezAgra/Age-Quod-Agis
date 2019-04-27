<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DayTaskType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('description',TextType::class,[
				'label'=>false,
				'attr'=>[
					'maxlength'=>'40'
				]
			])
			->add('submit',SubmitType::class,[
				'label'=>false
			])
			;

	}
}