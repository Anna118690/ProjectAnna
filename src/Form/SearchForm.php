<?php

namespace App\Form;

use App\Data\SearchData;
use App\Entity\Language;
use App\Entity\Level;
use App\Entity\Approach;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;


 class SearchForm extends AbstractType
 {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('q', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' =>[
                    
                    'placeholder'=> 'Search course']

            ])

            ->add('languages', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Language::class,
                'expanded' => true,
                'multiple' => true 
            ])

            ->add('levels', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Level::class,
                'expanded' => true,
                'multiple' => true 
            ])

            ->add('approachs', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Approach::class,
                'expanded' => true,
                'multiple' => true 
            ])


            ->add('min', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' =>[
                    
                    'placeholder'=> 'Prix min']

            ])

            ->add('max', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' =>[
                    
                    'placeholder'=> 'Prix max']

            ])



           
            ;


        
    }
     public function configureOptions(OptionsResolver  $resolver)

     {
        $resolver->setDefaults([
            'data_class'=> SearchData::class,
            'method'=> 'GET',
            'csrf_protection' => false
        ]);

         
     }

     public function getBlockPrefix()
     {
         return '';
     }
 }
