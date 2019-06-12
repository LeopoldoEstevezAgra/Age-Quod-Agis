<?php
namespace AppBundle\Form;

use AppBundle\Entity\Goal;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class GoalType extends AbstractType
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
        $builder
            ->add('title', TextType::class, array(
                'label' => 'Title',
                'required' => true,
                'attr' => [
                    'placeholder' => 'Title'
                ]
            ))

            ->add('description', TextareaType::class, array(
                'label' => 'Description',
                'required' => true,
                'attr' => [
                    'placeholder' => 'Description'
                ]
            ))
            ->add('date', DateTimeType::class, [
                'label' => 'Finish date',
                'widget' => 'single_text',
                'format' => 'yyyy/MM/dd HH:mm',
                'attr' => [
                    'class' => 'datetimepicker',

                ]
            ])
            ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Goal',
            'user' => null,
        ));
    }
}
