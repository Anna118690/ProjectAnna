<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ApproachFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
              
                ->add ('approach', ChoiceType::class, [
                    'choices' => [
                        'Adult' => 'Adult',
                        'Child' => 'Child'
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

