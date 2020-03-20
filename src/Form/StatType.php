<?php

namespace App\Form;

use App\Entity\Country;
use App\Entity\Stat;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('contaminated',IntegerType::class)
            ->add('healed', IntegerType::class)
            ->add('zombified',IntegerType::class )
            ->add('stat_date', DateType::class)
            ->add('country',EntityType::class,[
                'class'=>Country::class,
                'choice_label'=> 'Name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Stat::class,
        ]);
    }
}
