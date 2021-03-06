<?php

namespace Ardemis\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClientContactType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
                'label'              => 'views.form.label.name',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('email', 'email', [
                'label'              => 'views.form.label.email',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('phoneNumber', null, [
                'label'              => 'views.form.label.phone',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('skype', null)
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ardemis\MainBundle\Entity\ClientContact'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ardemis_mainbundle_clientcontact';
    }

}
