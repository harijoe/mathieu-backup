<?php

namespace Ardemis\MainBundle\Form;

use Ardemis\MainBundle\Entity\Candidate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class CandidateType
 */
class CandidateType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', null, [
                'label'              => 'views.form.label.lastname',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('firstname', null, [
                'label'              => 'views.form.label.firstname',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('address', null, [
                'label'              => 'views.form.label.address',
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
            ->add('phoneNumber', null, [
                'label'              => 'views.form.label.phone',
                'translation_domain' => 'ArdemisMainBundle',
                'required'           => false,
            ])
            ->add('skypeUsername', null, [
                'label'              => 'views.form.label.skype',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('email', null, [
                'label'              => 'views.form.label.email',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('disponibility', 'choice', [
                'choices'            => Candidate::getDisponibilities(),
                'label'              => 'views.form.label.disponibility',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('disponibilityNegociable', null, [
                'label'              => 'views.form.label.disponibility_negociable',
                'translation_domain' => 'ArdemisMainBundle',
                'required'           => false
            ])
            ->add('experience', 'choice', [
                'choices'            => Candidate::getExperiences(),
                'label'              => 'views.form.label.experience',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('mobility', 'choice', [
                'choices'            => Candidate::getMobilities(),
                'label'              => 'views.form.label.mobility',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('mobilityComplement', null, [
                'label'              => 'views.form.label.mobility_complement',
                'translation_domain' => 'ArdemisMainBundle',
                'required'           => false
            ])
            ->add('grade', 'choice', [
                'choices'            => Candidate::getGrades(),
                'label'              => 'views.form.label.grade',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('gradeComplement', null, [
                'label'              => 'views.form.label.grade_complement',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('job', 'choice', [
                'choices'            => Candidate::getJobs(),
                'label'              => 'views.form.label.job',
                'translation_domain' => 'ArdemisMainBundle',
            ])
            ->add('income', 'choice', [
                'choices'            => Candidate::getIncomes(),
                'label'              => 'views.form.label.income',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('languages', null, [
                'label'              => 'views.form.label.languages',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('keySkills', null, [
                'label'              => 'views.form.label.key_skills',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('cv', new DocumentType(), [
                'label'              => 'views.form.label.cv',
                'translation_domain' => 'ArdemisMainBundle',
                'required'           => false,
            ])
            ->add('motivation', new DocumentType(), [
                'label'              => 'views.form.label.motivation',
                'translation_domain' => 'ArdemisMainBundle',
                'required'           => false,
            ])
            ->add('jobOffer', null, [
                'label'              => 'views.form.label.joboffer',
                'translation_domain' => 'ArdemisMainBundle',
                'required'           => false,
                'empty_value'        => 'views.form.label.empty_select.job',
                'required'           => false,
                'empty_data'         => '',
            ])
            ->add('comments', null, [
                'label'              => 'views.form.label.comments',
                'translation_domain' => 'ArdemisMainBundle'
            ])
            ->add('note', 'genemu_jqueryrating', [
                'label'              => 'views.form.label.note',
                'translation_domain' => 'ArdemisMainBundle',
                'required'           => false,
        ]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'         => 'Ardemis\MainBundle\Entity\Candidate',
            'csrf_protection'    => false,
            'cascade_validation' => true,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ardemis_mainbundle_candidate';
    }

}
