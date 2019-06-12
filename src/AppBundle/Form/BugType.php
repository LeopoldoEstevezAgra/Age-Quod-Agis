<?php

namespace AppBundle\Form;

use AppBundle\Entity\Bug;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
            ->add('description',TextType::class, [
                'label' => 'Description',
                'attr'=> [
                    'rows' => 10
                ]
            ])
            ->add('screen',[
                'label'=> 'Screen',
                'expanded'=> true,
                'required' => true,
                'choices'=> [
                    'index' => 'index',
                    'goals' => 'goals',
                    'calendar'=> 'calendar',
                    'wallet' => 'wallet'
                ]

            ])
            ->add('genericFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => true,
                'download_uri' => true,
                'download_label' => false
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
