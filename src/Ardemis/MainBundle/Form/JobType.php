<?php

namespace Ardemis\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Ardemis\MainBundle\Entity\Job;

class JobType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                    'label' => 'views.form.label.title',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('startAt', 'date', [
                    'widget' => 'single_text',
                    'datepicker' => true,
                    'label' => 'views.form.label.startat',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('expireAt', 'date', [
                    'widget' => 'single_text',
                    'datepicker' => true,
                    'label' => 'views.form.label.expireat',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('job', null, [
                    'label' => 'views.form.label.job',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('type', 'choice', [
                    'label' => 'views.form.label.type',
                    'translation_domain' => 'ArdemisMainBundle',
                    'choices' => Job::getTypes()
                ])
            ->add('income', null, [
                    'label' => 'views.form.label.income',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('technologies', null, [
                    'label' => 'views.form.label.technologies',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('grade', 'choice', [
                    'label' => 'views.form.label.grade',
                    'translation_domain' => 'ArdemisMainBundle',
                    'choices' => Job::getGrades()
                ])
            ->add('position', null, [
                    'label' => 'views.form.label.position',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('location', null, [
                    'label' => 'views.form.label.location',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('summary', null, [
                    'label' => 'views.form.label.summary',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('description', null, [
                    'label' => 'views.form.label.description',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('published', null, [
                    'label' => 'views.form.label.published',
                    'translation_domain' => 'ArdemisMainBundle',
                    'required' => false
                ]);
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
