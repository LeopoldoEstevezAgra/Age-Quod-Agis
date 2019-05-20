<?php

namespace AppBundle\Form;

use AppBundle\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EventType extends AbstractType
{
    private $options;

    /**
     * @var AuthorizationChecker
     */
    private $authorizationChecker = null;

    public function __construct(AuthorizationChecker $authorizationChecker)
    {
        $this->authorization = $authorizationChecker;
        //  $this->user = $tokenStorage->getToken()->getUser();
    }


    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $this->options = $options;


        $builder
            ->add('title', null, [
                'label' => 'Título',
            ])
            ->add('description', null, [
                'label' => 'Descripción',
            ]);
             $builder
            ->add('starts', DateTimeType::class, [
               'label' => 'Start date',
                'widget' => 'single_text',
                'format' => 'yyyy/MM/dd HH:mm',
                'attr' => [
                    'class' => 'datetimepicker'
                ] 
            ])

            // ->add('allDay', null, [
            //     'label' => 'Todo el día ',
            // ])
            ->add('ends', DateTimeType::class, [
                'label' => 'Fecha de finalización ( Opcional )',
                'widget' => 'single_text',
                'format' => 'yyyy/MM/dd HH:mm',
                'attr' => [
                    'class' => 'datetimepicker',

                ]
            ])
            ->add('venue', null, [
                'label' => 'Localización',
                'required' => false,
            ])
            ->add('color', ChoiceType::class, array(
                'label' => 'color',
                'expanded' => true,
                'choices' => Event::getColors(),
                'choice_label' => function ($value) {
                    return $value;
                },
                'placeholder' => 'no_color',
                'required' => false,
            ));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Event',
            'user' => null,
        ));
    }
}
