<?php
/**
 * Created by PhpStorm.
 * User: eldar
 * Date: 28.06.2020
 * Time: 23:49
 */

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class EmployeeFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name',
                TextType::class,
                [
                    'constraints' => [new NotBlank()],
                    'attr' => ['class' => 'form-control']
                ]
            )
            ->add(
                'age',
                IntegerType::class,
                [
                    'attr' => [
                        'min' => 0,
                        'max' => 200,
                        'class' => 'form-control'
                    ]
                ]
            )
            ->add(
                'kids_count',
                IntegerType::class,
                [
                    'attr' => [
                        'min' => 0,
                        'max' => 100,
                        'class' => 'form-control'
                    ],
                ]
            )
            ->add(
                'uses_car',
                ChoiceType::class,
                [
                    'choices'  => [
                        'Yes' => 1,
                        'No' => 0,
                    ],
                    'constraints' => [new NotBlank()],
                    'attr' => ['class' => 'form-control']
                ]
            )
            ->add(
                'gross',
                IntegerType::class,
                [
                    'attr' => [
                        'min' => 0,
                        'max' => 1000000,
                        'class' => 'form-control'
                    ]
                ]
            )
            ->add(
                'create',
                SubmitType::class,
                [
                    'attr' => ['class' => 'btn btn-secondary float-right'],
                    'label' => 'Create!'
                ]
            );
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'App\Entity\Employee'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'employee_form';
    }
}