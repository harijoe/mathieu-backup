<?php

namespace Ardemis\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * JobFilterType filter.

 */
class JobFilterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('createdAt', 'filter_date_range', array(
                'attr' => array('class' => 'form-control')
            ))
            ->add('title', 'filter_text', array(
                'attr' => array('class' => 'form-control')
            ))
            ->add('type', 'filter_text', array(
                'attr' => array('class' => 'form-control')
            ))
            ->add('location', 'filter_text', array(
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
            'data_class' => 'Ardemis\MainBundle\Entity\Job'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ardemis_mainbundle_jobfiltertype';
    }
}
