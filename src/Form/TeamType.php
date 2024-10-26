<?php

namespace App\Form;

use App\Entity\Team;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class, array(
                'label'  => 'Nome',
                'required' => true,
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label_attr' => array(
                    'class' => 'col-form-label',
                )
            ))
            ->add('fullName',TextType::class, array(
                'label'  => 'Nome Completo',
                'required' => true,
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label_attr' => array(
                    'class' => 'col-form-label',
                ),
            ))
            ->add('engine',TextType::class, array(
                'label'  => 'Motor',
                'required' => true,
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label_attr' => array(
                    'class' => 'col-form-label',
                ),
            ))
            ->add('yearFoundation',DateType::class, array(
                'widget' => 'choice',
                'input'  => 'datetime_immutable',
                'label'  => 'Ano de Fundação',
                'required' => true,
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label_attr' => array(
                    'class' => 'col-form-label',
                ),
            ))
            ->add('victory',IntegerType::class, array(
                'label'  => 'Vitórias',
                'required' => true,
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label_attr' => array(
                    'class' => 'col-form-label',
                ),
            ))
            ->add('podium',IntegerType::class, array(
                'label'  => 'Pódio',
                'required' => true,
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label_attr' => array(
                    'class' => 'col-form-label',
                ),
            ))
            ->add('polePosition',IntegerType::class, array(
                'label'  => 'Pole position',
                'required' => true,
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label_attr' => array(
                    'class' => 'col-form-label',
                ),
            ))
            ->add('base',TextType::class, array(
                'label'  => 'Base',
                'required' => true,
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label_attr' => array(
                    'class' => 'col-form-label',
                ),
            ))
            ->add('urlImage', UrlType::class, array(
                'label'  => 'Url Imagem',
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
            'data_class' => Team::class,
        ]);
    }
}