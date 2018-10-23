<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class DatosTortaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('datos', CollectionType::class, [
                'label' => false,
                'attr' => array(
                        "class" => "col-sm-12"
                    ),
                'entry_type' => DatoTortaType::class,
                'entry_options' => array("label" => false,
                    "attr" => array(
                        "class" => "col-sm-12 form-inline"
                    )),
                'allow_delete' => true,
                'allow_add' => true,
                'by_reference' => false,
            ])
        ;
    }
}
