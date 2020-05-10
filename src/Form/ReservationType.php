<?php

namespace App\Form;

use App\Entity\Course;
use App\Entity\Reservation;
use App\Repository\CourseRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateType::class, [
                'widget' => 'choice',
            ])
            ->add('time', TimeType::class, [
                'input'  => 'datetime',
                'widget' => 'choice',
            ])
            ->add('course', EntityType::class,[
                'class' => Course::class, 
                'query_builder' => function(CourseRepository $er){
                    return $er->createQueryBuilder('generic')->orderBy('generic.namecourse');
                },
                'choice_label' => function ($x)
                {
                    return strtoupper($x->getNamecourse());
                }
            ]) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
