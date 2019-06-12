<?php

namespace AppBundle\Form;

use AppBundle\Entity\Bug;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class BugType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class , [
                'label' => 'Title',
            ])
            ->add('description',TextareaType::class, [
                'label' => 'Description',
                'attr'=> [
                    'rows' => 10
                ]
            ])
            ->add('screen',ChoiceType::class,[
                'label'=> 'Screen',
                'required' => true,
                'choices'=> [
                    'index' => 'index',
                    'goals' => 'goals',
                    'calendar'=> 'calendar',
                    'wallet' => 'wallet'
                ]

            ])
            ->add('imageFile', VichImageType::class, [
                'label'=>'Select an example image ( Optional )',
                'required' => false,
                'allow_delete' => true,
            ])
            ;

    }
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Bug',
            'user' => null,
        ));
    }

}
