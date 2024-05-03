<?php

namespace App\Form;

use App\Entity\ContactUs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length; // Add this line
use Symfony\Component\Form\FormBuilderInterface; // Add this line
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactUsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void // Update this line
    {
        // Code for building the form

        $builder
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '2',
                    'maxlength' => '180',
                ],
                'label' => 'Adresse email',
                'label_attr' => [
                    'class' => 'form-label mt-4',
                ],
                'constraints' => [
                    new Email(),
                    new Length(['min' => 2, 'max' => 180, 'minMessage' => "minErrorMessage", 'maxMessage' => "MaxErrorMessage"]) // Update this line
                ]
            ])
            ->add('Subject', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '2',
                    'maxlength' => '200',
                ],
                'label' => 'Sujet',
                'label_attr' => [
                    'class' => 'form-label mt-4',
                ],
                'constraints' => [
                    new Length(['min' => 2, 'max' => 100, 'minMessage' => "minErrorMessage", 'maxMessage' => "MaxErrorMessage"])
                ]
            ])
            ->add(
                'message',
                TextareaType::class,
                [
                    'attr' => [
                        'class' => 'form-control'
                    ],
                    'label' => 'Description',
                    'label_attr' => [
                        'class' => 'form-label mt-4',
                    ],
                    'constraints' => [
                        new NotBlank(),
                    ]
                ]
            )
            ->add('submit', SubmitType::class);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactUs::class,
        ]);
    }
}
