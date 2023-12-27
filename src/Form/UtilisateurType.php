<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType; // Import the missing class
use Symfony\Component\Form\Extension\Core\Type\TextType; // Import the missing class
use Symfony\Component\Form\Extension\Core\Type\CollectionType; // Import the missing class
use Symfony\Component\Form\Extension\Core\Type\SubmitType; // Import the missing class

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class) // Use the imported class
            // ...

                        ->add('roles', CollectionType::class, [
                // ...

                'entry_type' => TextType::class,
            ]) 
            ->add('password')

            ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
