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
            ->add('agency', null, [
                    'label' => 'views.form.label.agency',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('client', null, [
                    'label' => 'views.form.label.client',
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
            ->add('jobType', 'choice', [
                    'label' => 'views.form.label.jobtype',
                    'translation_domain' => 'ArdemisMainBundle',
                    'choices' => Job::getJobTypes()
                ])
            ->add('incomeType', 'choice', [
                    'label' => 'views.form.label.incometype',
                    'translation_domain' => 'ArdemisMainBundle',
                    'choices' => Job::getIncomeTypes()
                ])
            ->add('income', null, [
                    'label' => 'views.form.label.income',
                    'translation_domain' => 'ArdemisMainBundle',
                    'required' => false
                ])
            ->add('incomeBasedOnProfile', null, [
                    'label' => 'views.form.label.income_based_on_profile',
                    'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('technologies', null, [
                    'label' => 'views.form.label.technologies',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('tools', null, [
                    'label' => 'views.form.label.tools',
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
            ->add(
                'city', null, [
                    'label' => 'views.form.label.city',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add(
                'region', null, [
                    'label' => 'views.form.label.region',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('summary', null, [
                    'label' => 'views.form.label.summary',
                    'translation_domain' => 'ArdemisMainBundle',
                    'attr' => ['rows' => '5']
                ])
            ->add('description', null, [
                    'label' => 'views.form.label.description',
                    'translation_domain' => 'ArdemisMainBundle',
                    'attr' => ['rows' => '13']
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
