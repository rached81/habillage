<?php

namespace App\Form;

use App\Entity\District;
use App\Entity\Groupe;
use App\Entity\RollerType;
use App\Entity\Season;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GroupeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('labelFr')
            ->add('label_ar')
            ->add('year')
            ->add('rollerType', EntityType::class, [
                'placeholder' => 'Choisir  Type de Rouleau',
                'class' => RollerType::class,
                'choice_label' => 'label_fr',
                'expanded' => false,
                'multiple' => false
            ])
            ->add('season', EntityType::class, [
                'placeholder' => 'Choisir Saison',
                'class' => Season::class,
                'choice_label' => 'label_fr',
                'expanded' => false,
                'multiple' => false])
            ->add('district', EntityType::class, [
                'placeholder' => 'Choisir  District',
                'class' => District::class,
                'choice_label' => 'label_fr',
                'expanded' => false,
                'multiple' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Groupe::class,
        ]);
    }
}
