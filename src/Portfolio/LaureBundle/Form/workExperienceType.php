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
        $choiceYear = null;

        for ($i = 0; $i <= 6; $i++) {
            $date = date("Y", strtotime("-".$i." year"));
            $dateArray[$date] = $date;
            $choiceYear["choices"] = $dateArray;
        }

        $builder
            ->add('company')
            ->add('type', 'text', array('required' => false))
            ->add('yourJob')
            ->add('information')
            ->add('year','choice',$choiceYear)
            ->add('file')
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
