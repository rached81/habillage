<?php

namespace App\Form;

use App\Entity\Groupe;
use App\Entity\Line;
use App\Entity\TourProgram;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TourProgramType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code')
            ->add('amplitude')
            ->add('driverPaidHours')
            ->add('receiverPaidHours')
            ->add('groupe', EntityType::class, [
                'placeholder' => 'Choisir  le groupe',
                'class' => Groupe::class,
                'choice_label' => 'labelFr',
                'expanded' => false,
                'multiple' => false
            ])
           // ->add('line', EntityType::class, [ 'placeholder' => 'Choisir la ligne', 'class' => Line::class, 'choice_label' => 'label_fr', 'extended' => false, 'multiple' => false ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TourProgram::class,
        ]);
    }
}
