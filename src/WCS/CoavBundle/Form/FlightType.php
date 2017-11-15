<?php

namespace WCS\CoavBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use WCS\CoavBundle\Entity\Terrain;

class FlightType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('departure', EntityType::class, [
                'class' => Terrain::class,
                'choice_label' => 'fullName',
            ])
            ->add('arrival', EntityType::class, [
                'class'=> Terrain::class,
                'choice_label' => 'fullName',
            ])
            ->add('nbFreeSeats')
            ->add('seatPrice')
            ->add('takeOffTime')
            ->add('publicationDate')
            ->add('description')
            ->add('pilot')
            ->add('plane')
            ->add('wasDone');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WCS\CoavBundle\Entity\Flight'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'wcs_coavbundle_flight';
    }


}
