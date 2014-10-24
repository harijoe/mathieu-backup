<?php

namespace Ardemis\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class CandidateType
 */
class CandidateType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('address')
            ->add('zipcode')
            ->add('city')
            ->add('email')
            ->add('disponibility')
            ->add('disponibilityNegociable')
            ->add('experience')
            ->add('mobility')
            ->add('mobilityComplement')
            ->add('grade')
            ->add('gradeComplement')
            ->add('job')
            ->add('income')
            ->add('languages')
            ->add('keySkills')
            ->add('cv')
            ->add('motivation')
            ->add('handicap');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ardemis\MainBundle\Entity\Candidate'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'candidate';
    }
}
