<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DatoBarraType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ejex', TextType::class, array(
              'attr' => array('class' => 'col-md-6'),
            ))
            ->add('ejey', NumberType::class, array(
              'attr' => array('class' => 'col-md-6'),
            ))
        ;
    }
}
