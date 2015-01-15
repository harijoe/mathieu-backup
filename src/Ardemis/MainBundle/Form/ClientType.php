<?php

namespace Ardemis\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClientType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('companyName', null, [
                'label' => 'views.form.label.companyname',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('zipcode', null, [
                'label' => 'views.form.label.zipcode',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('city', null, [
                'label' => 'views.form.label.city',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('activity', null, [
                'label' => 'views.form.label.activity',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('address', null, [
                'label' => 'views.form.label.address',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('updated', null, [
                'label' => 'views.form.label.updated',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('file', null, [
                'label' => 'views.form.label.file',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('agency', null, [
                'label' => 'views.form.label.agency',
                'translation_domain' => 'ArdemisMainBundle'
            ]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ardemis\MainBundle\Entity\Client'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ardemis_mainbundle_client';
    }
}
