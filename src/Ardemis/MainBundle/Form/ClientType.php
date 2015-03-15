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
                'label'              => 'views.form.label.companyname',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('mail', null, [
                'label'              => 'views.form.label.email',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('phone', null, [
                'label'              => 'views.form.label.phone',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('zipcode', null, [
                'label'              => 'views.form.label.zipcode',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('city', null, [
                'label'              => 'views.form.label.city',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('activity', null, [
                'label'              => 'views.form.label.activity',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('address', null, [
                'label'              => 'views.form.label.address',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('updated', null, [
                'label'              => 'views.form.label.updated',
                'translation_domain' => 'ArdemisMainBundle'
            ])
//            ->add('file', null, [
//                'label'              => 'views.form.label.file',
//                'translation_domain' => 'ArdemisMainBundle'
//            ])
            ->add('agency', null, [
                'label'              => 'views.form.label.agency',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('note', 'genemu_jqueryrating', [
                'label'              => 'views.form.label.note',
                'translation_domain' => 'ArdemisMainBundle',
                'required'           => false,
            ])
            ->add('contacts', 'collection', [
                'type'              => new ClientContactType(),
                'translation_domain' => 'ArdemisMainBundle',
                'allow_add'         => true,
                'allow_delete'      => true,
                'by_reference'      => false,
                'prototype'         => true,
                'widget_add_btn'    => ['label' => 'views.form.label.add_contact', 'translation_domain' => 'ArdemisMainBundle' ],
                //not work with this mopa version
                'widget_remove_btn' => ['label' => 'views.form.label.remove_contact', 'translation_domain' => 'ArdemisMainBundle' ],
                'show_legend'       => false,
                'attr'              => ['class' => 'client_contacts_sub_form' ],
            ])
            ->add('comments', 'collection', [
                'type'               => new CommentType(),
                'label'              => 'views.form.label.comments',
                'translation_domain' => 'ArdemisMainBundle',
                'allow_add'          => true,
                'allow_delete'       => true,
                'by_reference'       => false,
                'prototype'          => true,
                'widget_add_btn'     => ['label' => 'views.form.label.add_comment', 'translation_domain' => 'ArdemisMainBundle' ],
                //not work with this mopa version
                'widget_remove_btn'  => ['label' => 'views.form.label.remove_comment', 'translation_domain' => 'ArdemisMainBundle' ],
                'show_legend'        => false,
                'attr'               => ['class' => 'comment_sub_form' ],
            ])
        ;
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
