<?php

namespace Portfolio\LaureBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class workExperienceType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('company')
            ->add('type')
            ->add('yourJob')
            ->add('information')
            ->add('year')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Portfolio\LaureBundle\Entity\workExperience'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'portfolio_laurebundle_workexperience';
    }
}
