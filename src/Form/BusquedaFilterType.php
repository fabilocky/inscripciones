<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type as Filters;
use Lexik\Bundle\FormFilterBundle\Filter\Query\QueryInterface;

class BusquedaFilterType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('buscar', Filters\TextFilterType::class, array(
                    'attr' => array(
                        'class' => 'form-control s-lg',
                        'placeholder' => 'Buscar...',
                        'title' => "Buscar",
                        'tabindex' => "11"
                    )
                ))
                ->add('donde', Filters\ChoiceFilterType::class, array(
                    'choices' => array(
                        'Buscar en el sitio completo' => 'Sitio',
                        'Buscar solo en las noticias' => 'Noticias',                        
                    ),
                    'choice_attr' => function($choiceValue, $key, $value) {
                        // adds a class like attending_yes, attending_no, etc
                        return ['class' => 'form-check-input',
                            'title' => $key,
                            'tabindex' => "11"
                        ];
                    },
//                    'choice_label_attr' => function($choiceValue, $key, $value) {
//                        // adds a class like attending_yes, attending_no, etc
//                        return ['class' => 'form-check-label',
//                            //'title' => $key,
//                            'tabindex' => "11"
//                        ];
//                    },
                    'placeholder' => false,
                    'expanded' => true,
                    'multiple' => false,
                    'data' => 'Sitio'
                ))
//            ->add('sitio', Filters\CheckboxFilterType::class,array(
//                'label'    => 'Buscar en el sitio completo',
//                'required' => false,
//                'attr' => array(
//                    'class' => 'form-check-input',                    
//                    'title' => "Buscar en el sitio completo",
//                    'tabindex' => "11"
//                )
//            ))
//            ->add('noticias', Filters\CheckboxFilterType::class,array(
//                'label'    => 'Buscar solo en las Noticias',
//                'required' => false,
//                'attr' => array(
//                    'class' => 'form-check-input',                    
//                    'title' => "Buscar solo en las Noticias",
//                    'tabindex' => "11"
//                )
//            ))            
        ;
    }

    public function getBlockPrefix() {
        return 'busqueda_filter';
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => null,
            'csrf_protection' => false,
            'validation_groups' => array('filtering'),
            'attr' => array(
                'class' => 'form-inline'
            )
        ));
    }

}
