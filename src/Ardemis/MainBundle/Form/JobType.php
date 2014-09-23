<?php

namespace Ardemis\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class JobType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('createdAt')
            ->add('publishedAt')
            ->add('published')
            ->add('startAt')
            ->add('expireAt')
            ->add('title')
            ->add('job')
            ->add('type')
            ->add('income')
            ->add('technologies')
            ->add('grade')
            ->add('position')
            ->add('location')
            ->add('summary')
            ->add('description')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ardemis\MainBundle\Entity\Job'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ardemis_mainbundle_job';
    }
}
