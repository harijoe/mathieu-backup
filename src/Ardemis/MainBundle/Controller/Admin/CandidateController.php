<?php

namespace Ardemis\MainBundle\Controller\Admin;

use Ardemis\MainBundle\Entity\Candidate;
use Ardemis\MainBundle\Form\CandidateFilterType;
use Ardemis\MainBundle\Form\CandidateType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Candidate controller.
 *
 * @Route("/candidats")
 */
class CandidateController extends Controller
{

    /**
     * Lists all Candidate entities.
     *
     * @Route("/", name="candidate")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        list($filterForm, $queryBuilder) = $this->filter($request);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $queryBuilder,
            $this->get('request')->query->get('page', 1),
            (isset($this->container->parameters['knp_paginator.page_range'])) ? $this->container->parameters['knp_paginator.page_range'] : 10
        );

        return array(
            'entities' => $pagination,
            'filterForm' => $filterForm->createView(),
        );
    }

    /**
     * Process filter request.
     *
     * @return array
     */
    protected function filter(Request $request)
    {
        $session = $request->getSession();
        $filterForm = $this->createFilterForm();
        $em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->getRepository('ArdemisMainBundle:Candidate')
            ->createQueryBuilder('a')
            ->orderBy('a.id', 'DESC');
        // submit values from the request
        $filterForm->handleRequest($request);
        // Reset filter
        if ($filterForm->get('reset')->isClicked()) {
            $session->remove('CandidateControllerFilter');
            $filterForm = $this->createFilterForm();
        }

        // Filter action
        if ($filterForm->get('filter')->isClicked()) {
            if ($filterForm->isValid()) {
                // Build the query from the given form object
                $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($filterForm, $queryBuilder);
                // Save filter to session
                $filterData = $filterForm->getData();
                $session->set('CandidateControllerFilter', $filterData);
            }
        } else {
            // Get filter from session
            if ($session->has('CandidateControllerFilter')) {
                $filterData = $session->get('CandidateControllerFilter');
                $filterForm = $this->createFilterForm($filterData);
                $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($filterForm, $queryBuilder);
            }
        }

        return array($filterForm, $queryBuilder);
    }

    /**
     * Create filter form.
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createFilterForm($filterData = null)
    {
        $form = $this->createForm(new CandidateFilterType(), $filterData, array(
            'action' => $this->generateUrl('candidate'),
            'method' => 'GET',
        ));

        $form
            ->add('filter', 'submit', array(
                'translation_domain' => 'ArdemisMainBundle',
                'label' => 'views.index.filter',
                'attr' => array('class' => 'btn btn-success col-lg-1'),
            ))
            ->add('reset', 'submit', array(
                'translation_domain' => 'ArdemisMainBundle',
                'label' => 'views.index.reset',
                'attr' => array('class' => 'btn btn-danger col-lg-1 col-lg-offset-1'),
            ));

        return $form;
    }

    /**
     * Creates a new Candidate entity.
     *
     * @Route("/", name="candidate_create")
     * @Method("POST")
     * @Template("ArdemisMainBundle:Admin\Candidate:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Candidate();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            $nextAction = $form->get('saveAndAdd')->isClicked()
                ? $this->generateUrl('candidate_new')
                : $this->generateUrl('candidate_show', array('id' => $entity->getId()));
            return $this->redirect($nextAction);

        }
        $this->get('session')->getFlashBag()->add('danger', 'flash.create.error');

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Candidate entity.
     *
     * @param Candidate $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Candidate $entity)
    {
        $form = $this->createForm(new CandidateType(), $entity, array(
            'action' => $this->generateUrl('candidate_create'),
            'method' => 'POST',
        ));

        $form
            ->add(
                'save', 'submit', array(
                    'translation_domain' => 'ArdemisMainBundle',
                    'label' => 'views.new.save',
                    'attr' => array('class' => 'btn btn-success col-lg-2')
                )
            )
            ->add(
                'saveAndAdd', 'submit', array(
                    'translation_domain' => 'ArdemisMainBundle',
                    'label' => 'views.new.saveAndAdd',
                    'attr' => array('class' => 'btn btn-primary col-lg-2 col-lg-offset-1')
                )
            );

        return $form;
    }

    /**
     * Displays a form to create a new Candidate entity.
     *
     * @Route("/new", name="candidate_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Candidate();
        $form = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Candidate entity.
     *
     * @Route("/{id}", name="candidate_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArdemisMainBundle:Candidate')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Candidate entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a form to delete a Candidate entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        $mensaje = $this->get('translator')->trans('views.recordactions.confirm', array(), 'ArdemisMainBundle');
        $onclick = 'return confirm("' . $mensaje . '");';
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('candidate_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array(
                'translation_domain' => 'ArdemisMainBundle',
                'label' => 'views.recordactions.delete',
                'attr' => array(
                    'class' => 'btn btn-danger col-lg-11',
                    'onclick' => $onclick,
                )
            ))
            ->getForm();
    }

    /**
     * Displays a form to edit an existing Candidate entity.
     *
     * @Route("/{id}/edit", name="candidate_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArdemisMainBundle:Candidate')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Candidate entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a form to edit a Candidate entity.
     *
     * @param Candidate $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Candidate $entity)
    {
        $form = $this->createForm(new CandidateType(), $entity, array(
            'action' => $this->generateUrl('candidate_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form
            ->add(
                'save', 'submit', array(
                    'translation_domain' => 'ArdemisMainBundle',
                    'label' => 'views.new.save',
                    'attr' => array('class' => 'btn btn-success col-lg-2')
                )
            )
            ->add(
                'saveAndAdd', 'submit', array(
                    'translation_domain' => 'ArdemisMainBundle',
                    'label' => 'views.new.saveAndAdd',
                    'attr' => array('class' => 'btn btn-primary col-lg-2 col-lg-offset-1')
                )
            );

        return $form;
    }

    /**
     * Edits an existing Candidate entity.
     *
     * @Route("/{id}", name="candidate_update")
     * @Method("PUT")
     * @Template("ArdemisMainBundle:Admin/Candidate:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArdemisMainBundle:Candidate')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Candidate entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');

            $nextAction = $editForm->get('saveAndAdd')->isClicked()
                ? $this->generateUrl('candidate_new')
                : $this->generateUrl('candidate_show', array('id' => $id));
            return $this->redirect($nextAction);
        }

        $this->get('session')->getFlashBag()->add('danger', 'flash.update.error');

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Candidate entity.
     *
     * @Route("/{id}", name="candidate_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ArdemisMainBundle:Candidate')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Candidate entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.delete.success');
        }

        return $this->redirect($this->generateUrl('candidate'));
    }
}
