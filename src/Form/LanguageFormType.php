<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class LanguageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
       
        // ->add('name', TextType::class)
        ->add ('language', ChoiceType::class, [
            'choices' => [
                'English' => 'English',
                'Dutch' => 'Dutch',
                'French' => 'French'
            ],
            // les combinaisons de ces paramètres détermineront le type de
            // liste de choix : liste, liste déroulante, checkbox ou
            // radiobuttons
            'expanded' => false,
            'multiple' => true
    ])


        ->add('description', TextType::class);
    }
}
