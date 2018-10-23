<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class DatoTortaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder            
            ->add('ejex', TextType::class, array(
                "label" => "item",
                "attr" => array(
                    //"class" => "col-sm-6"
                        )
            ))
            ->add('ejey', NumberType::class, array(
                "label" => "valor",
                "attr" => array(
                    //"class" => "col-sm-3"
                        )
            ))
            ->add('activo', CheckboxType::class, array(
                "label" => "activo",
                "attr" => array(
                    //"class" => "col-sm-3"
                        )
            ))
        ;        
    }
    
    public function getBlockPrefix()
{
    return "";
}
}