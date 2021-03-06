<?php

namespace Kwejk\MemsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class AddRatingType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rating', 'choice', array(
                'choices' => array(
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    ),
                'multiple'=> false,
                'attr' => array('class' => 'form-control')
                
            ))
           ->add('save', 'submit',array(
                'attr' => array('class' => 'btn pull-right'),
                'label' => 'Dodaj Ocenę'
            ))     
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kwejk\MemsBundle\Entity\Rating'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'kwejk_memsbundle_rating';
    }
}
