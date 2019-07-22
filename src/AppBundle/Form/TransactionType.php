<?php
namespace AppBundle\Form;

use AppBundle\Entity\Transaction;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TransactionType extends AbstractType
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
            ->add('amount', IntegerType::class, array(
                'label' => 'Amount',
                'required' => true,
                'attr' => [
                    'placeholder' => 'Amount',
                    'class'=> 'width-100'
                ],
                

            ))

            ->add('reason', TextType::class, array(
                'label' => 'Reason',
                'required' => true,
                'attr' => [
                    'placeholder' => 'Reason',
                    'class'=> 'width-100'
                ]
            ));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Transaction',
            'user' => null,
        ));
    }
}
