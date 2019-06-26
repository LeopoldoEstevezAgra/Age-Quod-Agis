<?php
namespace AppBundle\Form;

use AppBundle\Entity\DayUnit;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class DayUnitType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, array(
                'label' => false,
                'required' => true,
                'choices' => array(
                    'Sleeping'=> 'sleeping',
                    'General tasks' => 'general',
                    'Personal work' => 'personalWork',
                    'Study' => 'study',
                    'Work / Uni' => 'work',
                    'Procrastination' => 'procrastination',
                    'Wasted time ' => 'wasted',
                    'Reading' => 'reading',
                    'Social interaction' => 'social',
                    'Unmarked' => 'unmarked',

                )
            ))
            ->add('amount',IntegerType::class,array(
                'label'=> false,
                'required'=>true,
                'attr'=>array(
                    'placeholder'=>0 
                )
            ))
            ->add('submit',SubmitType::class,[
                'label'=>false
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\DayUnit',
            'user' => null,
        ));
    }
}
