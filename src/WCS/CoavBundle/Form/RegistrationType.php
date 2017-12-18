<?php


namespace WCS\CoavBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType

{
    public function buildForm(FormBuilderInterface $builder, array $options)

    {
        $builder->add('firstName')
        ->add('lastName')
        ->add('role', ChoiceType::class, [
                'choices' => array(
                'Pilot' => 'Pilot',
                'Passenger' => 'Passenger',
                ),
            ])
        ->add('phoneNumber', NumberType::class)
        ->add('birthDate', BirthdayType::class)
        ->add('isACertifiedPilot');
    }

    public function getParent()

    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()

    {
        return 'app_user_registration';
    }

    public function getName()

    {
        return $this->getBlockPrefix();
    }

}