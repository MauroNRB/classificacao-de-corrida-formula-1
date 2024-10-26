<?php

namespace App\Form;

use App\Entity\Driver;
use App\Entity\DriverDay;
use App\Entity\GrandPix;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DriverDayType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('driver', EntityType::class, array(
                'class' => Driver::class,
                'query_builder' => function (EntityRepository $em) {
                    return $em->createQueryBuilder('o')
                        ->orderBy('o.name', 'ASC');
                },
                'choice_label' => function($driver) {
                    return $driver->getName();
                },
                'mapped' => false,
                'label' => 'Piloto',
                'required' => true,
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label_attr' => array(
                    'class' => 'col-form-label',
                ),
            ))
            ->add('grandPix', EntityType::class, array(
                'class' => GrandPix::class,
                'query_builder' => function (EntityRepository $em) {
                    return $em->createQueryBuilder('o')
                        ->orderBy('o.name', 'ASC');
                },
                'choice_label' => function($grandPix) {
                    return $grandPix->getName();
                },
                'mapped' => false,
                'label' => 'Grand Pix',
                'required' => true,
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label_attr' => array(
                    'class' => 'col-form-label',
                ),
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Salvar',
                'attr' => array(
                    'class' => 'btn btn-primary float-right',
                ),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DriverDay::class,
        ]);
    }
}