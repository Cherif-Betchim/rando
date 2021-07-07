<?php

namespace App\Form;

use App\Entity\Hiking;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HikingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('creator')
            ->add('title')
            ->add('time')
            ->add('distance')
            ->add('elevation')
            ->add('highest')
            ->add('lowest')
            ->add('difficulty')
            ->add('returnPoint')
            ->add('type')
            ->add('region')
            ->add('town')
            ->add('startPoint')
            ->add('description')
            ->add('image')
            ->add('crossingPoints')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Hiking::class,
        ]);
    }
}
