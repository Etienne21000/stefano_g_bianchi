<?php

namespace App\Form;

use App\Entity\Serie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class SerieFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'constraints' => [

                    new NotBlank([
                        'message' => 'Veuillez renseigner le titre'
                    ]),

                    new Length([
                        'min' => 2,
                        'max' => 255,
                        'minMessage' => 'Le titre doit contenir au moins 2 caractères',
                        'maxMessage' => 'Le titre ne peut pas dépasser 255 caractères'
                    ])
                ],

                'label' => 'Titre',
                'empty_data' => ''
            ])
            ->add('description', TextareaType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'La description ne peut pas êter vide'
                    ]),

                    new Length([
                        'min' => 2,
                        'minMessage' => 'Le texte doit contenir au moins 2 caractères',
                    ])
                ],

                'label' => 'Description',
                'empty_data' => ''
            ])
            ->add('tech', TextareaType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'La description technique ne peut pas êter vide'
                    ]),

                    new Length([
                        'min' => 2,
                        'minMessage' => 'Le texte doit contenir au moins 2 caractères',
                    ])
                ],

                'label' => 'Description technique',
                'empty_data' => ''
            ])

            ->add('slug', ChoiceType::class, [
                'label' => 'Type',
                'choices' => [
                    'slug' => [
                        'série' => 1,
                        'exposition' => 2
                    ]
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Serie::class,
        ]);
    }
}
