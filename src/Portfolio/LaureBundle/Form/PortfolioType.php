<?php

namespace Portfolio\LaureBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PortfolioType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('portfolioType','choice',array(
                'choices' => array(
                    'motion' => 'motion',
                    'print' => 'print',
                    'web' => 'web'
                ))
            )
            ->add('videoLinkHeader')
            ->add('title', 'textarea', array('attr' => array('rows' => '10','cols' => '1')))
            ->add('type')
            ->add('description')
            ->add('descriptionDetail')
            ->add('videoLink')
            ->add('siteLink')
            ->add('images','collection', array('type' => new ImageType(), 'allow_add' => true))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Portfolio\LaureBundle\Entity\Portfolio'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'portfolio_laurebundle_portfolio';
    }
}
