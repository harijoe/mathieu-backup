<?php

namespace Ardemis\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * SiteType form.
 */
class SiteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
                    'label' => 'views.form.label.name',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('contactEmail', null, [
                    'label' => 'views.form.label.contactemail',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('twitterLink', null, [
                    'label' => 'views.form.label.twitterlink',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('facebookLink', null, [
                    'label' => 'views.form.label.facebooklink',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('linkedinLink', null, [
                    'label' => 'views.form.label.linkedinlink',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('clientCount', null, [
                    'label' => 'views.form.label.clientcount',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('jobCount', null, [
                    'label' => 'views.form.label.jobcount',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('profilCount', null, [
                    'label' => 'views.form.label.profilcount',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('talkCount', null, [
                    'label' => 'views.form.label.talkcount',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('collaboratorCount', null, [
                    'label' => 'views.form.label.collaboratorcount',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('agencyCount', null, [
                    'label' => 'views.form.label.agencycount',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('hourstalkCount', null, [
                    'label' => 'views.form.label.hourstalkcount',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('hoursphoneCount', null, [
                    'label' => 'views.form.label.hoursphonecount',
                    'translation_domain' => 'ArdemisMainBundle'
                ])
            ->add('yearFounded', 'date', [
                    'label' => 'views.form.label.yearfounded',
                    'translation_domain' => 'ArdemisMainBundle',
                    'widget' => 'single_text',
                    'datepicker' => true
                ]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ardemis\MainBundle\Entity\Site'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ardemis_mainbundle_site';
    }
}
