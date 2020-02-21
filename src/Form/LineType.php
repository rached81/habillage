<?php

namespace App\Form;

use App\Entity\District;
use App\Entity\Line;
use App\Entity\RollerType;
use App\Entity\TypeLine;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('label_fr')
            ->add('label_ar')
            ->add('district', EntityType::class, [
                'placeholder' => 'Choisir  District',
                'class' => District::class,
                'choice_label' => 'label_fr',
                'expanded' => false,
                'multiple' => false
            ])
            ->add('type_line', EntityType::class, [
                'placeholder' => 'Choisir  Type de ligne',
                'class' => TypeLine::class,
                'choice_label' => 'label_fr',
                'expanded' => false,
                'multiple' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Line::class,
        ]);
    }
}
