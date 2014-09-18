<?php

namespace Ardemis\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * SiteFilterType filter
 */
class SiteFilterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'filter_text', array(
                'attr' => array('class' => 'form-control')
            ))
            ->add('contactEmail', 'filter_text', array(
                'attr' => array('class' => 'form-control')
            ))
            ->add('twitterLink', 'filter_text', array(
                'attr' => array('class' => 'form-control')
            ))
            ->add('facebookLink', 'filter_text', array(
                'attr' => array('class' => 'form-control')
            ))
            ->add('linkedinLink', 'filter_text', array(
                'attr' => array('class' => 'form-control')
            ))
            ->add('clientCount', 'filter_number_range', array(
                'attr' => array('class' => 'form-control')
            ))
            ->add('jobCount', 'filter_number_range', array(
                'attr' => array('class' => 'form-control')
            ))
            ->add('profilCount', 'filter_number_range', array(
                'attr' => array('class' => 'form-control')
            ))
            ->add('talkCount', 'filter_number_range', array(
                'attr' => array('class' => 'form-control')
            ))
            ->add('collaboratorCount', 'filter_number_range', array(
                'attr' => array('class' => 'form-control')
            ))
            ->add('agencyCount', 'filter_number_range', array(
                'attr' => array('class' => 'form-control')
            ))
            ->add('hourstalkCount', 'filter_number_range', array(
                'attr' => array('class' => 'form-control')
            ))
            ->add('hoursphoneCount', 'filter_number_range', array(
                'attr' => array('class' => 'form-control')
            ))
            ->add('yearFounded', 'filter_date_range', array(
                'attr' => array('class' => 'form-control')
            ));

        $listener = function (FormEvent $event) {
            // Is data empty?
            foreach ((array)$event->getForm()->getData() as $data) {
                if (is_array($data)) {
                    foreach ($data as $subData) {
                        if (!empty($subData)) {
                            return;
                        }
                    }
                } else {
                    if (!empty($data)) {
                        return;
                    }
                }
            }
            $event->getForm()->addError(new FormError('Filter empty'));
        };
        $builder->addEventListener(FormEvents::POST_SUBMIT, $listener);
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
        return 'ardemis_mainbundle_sitefiltertype';
    }
}
