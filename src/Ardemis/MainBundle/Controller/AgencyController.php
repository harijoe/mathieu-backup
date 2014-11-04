<?php

namespace Ardemis\MainBundle\Controller;

use Ardemis\MainBundle\Entity\Agency;
use Ardemis\MainBundle\Form\AgencyFilterType;
use Ardemis\MainBundle\Form\AgencyType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Agency controller.
 *
 * @Route("/agence")
 */
class AgencyController extends Controller
{

    /**
     * Lists all Agency entities.
     *
     * @param Request $request
     *
     * @Route("/", name="agency")
     * @Method("GET")
     * @Template()
     *
     * @return array
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
        $queryBuilder = $em->getRepository('ArdemisMainBundle:Agency')
            ->createQueryBuilder('a')
            ->orderBy('a.id', 'DESC');
        // Bind values from the request
        $filterForm->handleRequest($request);
        // Reset filter
        if ($filterForm->get('reset')->isClicked()) {
            $session->remove('AgencyControllerFilter');
            $filterForm = $this->createFilterForm();
        }

        // Filter action
        if ($filterForm->get('filter')->isClicked()) {
            if ($filterForm->isValid()) {
                // Build the query from the given form object
                $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($filterForm, $queryBuilder);
                // Save filter to session
                $filterData = $filterForm->getData();
                $session->set('AgencyControllerFilter', $filterData);
            }
        } else {
            // Get filter from session
            if ($session->has('AgencyControllerFilter')) {
                $filterData = $session->get('AgencyControllerFilter');
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
        $form = $this->createForm(new AgencyFilterType(), $filterData, array(
            'action' => $this->generateUrl('agency'),
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
     * Creates a new Agency entity.
     *
     * @Route("/", name="agency_create")
     * @Method("POST")
     * @Template("ArdemisMainBundle:Agency:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Agency();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            $nextAction = $form->get('saveAndAdd')->isClicked()
                ? $this->generateUrl('agency_new')
                : $this->generateUrl('agency_show', array('id' => $entity->getId()));
            return $this->redirect($nextAction);

        }
        $this->get('session')->getFlashBag()->add('danger', 'flash.create.error');

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Agency entity.
     *
     * @param Agency $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Agency $entity)
    {
        $form = $this->createForm(new AgencyType(), $entity, array(
            'action' => $this->generateUrl('agency_create'),
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
     * Displays a form to create a new Agency entity.
     *
     * @Route("/new", name="agency_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Agency();
        $form = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Agency entity.
     *
     * @Route("/{id}", name="agency_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArdemisMainBundle:Agency')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Agency entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a form to delete a Agency entity by id.
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
            ->setAction($this->generateUrl('agency_delete', array('id' => $id)))
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
     * Displays a form to edit an existing Agency entity.
     *
     * @Route("/{id}/edit", name="agency_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArdemisMainBundle:Agency')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Agency entity.');
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
     * Creates a form to edit a Agency entity.
     *
     * @param Agency $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Agency $entity)
    {
        $form = $this->createForm(new AgencyType(), $entity, array(
            'action' => $this->generateUrl('agency_update', array('id' => $entity->getId())),
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
     * Edits an existing Agency entity.
     *
     * @Route("/{id}", name="agency_update")
     * @Method("PUT")
     * @Template("ArdemisMainBundle:Agency:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArdemisMainBundle:Agency')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Agency entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');

            $nextAction = $editForm->get('saveAndAdd')->isClicked()
                ? $this->generateUrl('agency_new')
                : $this->generateUrl('agency_show', array('id' => $id));
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
     * Deletes a Agency entity.
     *
     * @Route("/{id}", name="agency_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ArdemisMainBundle:Agency')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Agency entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.delete.success');
        }

        return $this->redirect($this->generateUrl('agency'));
    }
}
