<?php

namespace WCS\CoavBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use WCS\CoavBundle\Entity\Flight;
use WCS\CoavBundle\Entity\Reservation;
use WCS\CoavBundle\Entity\User;

class ReservationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nbReservedSeats')
            ->add('publicationDate')
            ->add('passengers', CollectionType::class, [
                'entry_type' => EntityType::class,
                'entry_options' => array('class' => User::class,
                    'choice_label' => 'lastName')
            ])
            ->add('flight', EntityType::class, [
                'class' => Flight::class,
                'choice_label' => 'id',
            ])
            ->add('wasDone');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WCS\CoavBundle\Entity\Reservation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'wcs_coavbundle_reservation';
    }


}
