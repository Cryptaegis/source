<?php

namespace App\Form;

use App\Entity\Mission;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MissionFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom')
            ->add('Alias')
            ->add('Statut')
            ->add('Description')
            ->add('Contact')
            ->add('Cible')
            ->add('Planque')
            ->add('DateDebut')
            ->add('DateFin')
            ->add('agreeTerms', CheckboxType::class, ['mapped' => false, 'required' => false])
            ->add('Submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mission::class,
            'csrf_protection'=> true,
            'csrf_field_name' =>'_token',
            'csrf_token_id' => 'mission_item',
        ]);
    }
}
