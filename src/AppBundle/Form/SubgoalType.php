<?php
namespace AppBundle\Form;

use AppBundle\Entity\Subgoal;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SubgoalType extends AbstractType
{

    private $options;

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
            'data_class' => 'AppBundle\Entity\Subgoal',
            'user' => null,
        ));
    }
}
