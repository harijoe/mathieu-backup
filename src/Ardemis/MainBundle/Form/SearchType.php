<?php

namespace Ardemis\MainBundle\Form;


use Ardemis\MainBundle\Entity\Candidate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class SearchType
 */
class SearchType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setMethod('get');

        $builder
            ->add(
                'name',
                null,
                [
                    'required' => false,
                    'label' => 'views.form.label.name',
                    'translation_domain' => 'ArdemisMainBundle',
                ]
            )
            ->add(
                'keySkills',
                null,
                [
                    'required' => false,
                    'label' => 'views.form.label.key_skills',
                    'translation_domain' => 'ArdemisMainBundle',
                ]
            )            
            ->add(
                'disponibility',
                'choice',
                [
                    'choices' => Candidate::getDisponibilities(),
                    'label' => 'views.form.label.disponibility',
                    'translation_domain' => 'ArdemisMainBundle',
                    'required' => false
                ]
            )
            ->add('note', 'genemu_jqueryrating', ['required' => false])
            ->add('submit', 'submit', ['label' => 'Rechercher', 'attr' => ['class' => 'btn btn-primary']]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'csrf_protection' => false
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ardemis_mainbundle_searchtype';
    }
}
