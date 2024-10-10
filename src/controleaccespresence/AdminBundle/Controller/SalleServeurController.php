<?php

namespace controleaccespresence\AdminBundle\Controller;
use controleaccespresence\AdminBundle\Form\SalleServeurType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use controleaccespresence\AdminBundle\Form\EmployeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use controleaccespresence\AdminBundle\Entity\SalleServeur;


/**
 * salle serveur controller.
 *
 */
class SalleServeurController extends Controller
{

    /**
     * Lists all salleserveur entities.
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('controleaccespresenceAdminBundle:SalleServeur')->findAll();
        return $this->render('controleaccespresenceAdminBundle:salleserveur:index.html.twig', array(
            'entities'      => $entities,


        ));
    }
    /**
     * Creates a new salle serveur entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new salleserveur();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $session = $request->getSession();
            $session->getFlashBag()->add('info', 'Salle serveur bien enregistrée');
            return $this->redirect($this->generateUrl('salleserveur_show', array('id' => $entity->getId())));
        }

        return $this->render('controleaccespresenceAdminBundle:salleserveur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a contact entity.
     *
     * @param SalleServeur $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(SalleServeur $entity)
    {
        $form = $this->createForm(SalleServeurType::class, $entity, array(
            'action' => $this->generateUrl('salleserveur_create'),
            'method' => 'POST',
        ));

        $form->add('submit',SubmitType::class, array('label' => 'Ajouter',
            'attr' => array('class' => 'btn btn-info pull-left')));

        return $form;
    }

    /**
     * Displays a form to create a new employe entity.
     *
     */
    public function newAction()
    {
        $entity = new SalleServeur();
        $form   = $this->createCreateForm($entity);

        return $this->render('controleaccespresenceAdminBundle:salleserveur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a employe entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('controleaccespresenceAdminBundle:SalleServeur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find salle serveur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('controleaccespresenceAdminBundle:salleserveur:show.html.twig', array(
            'entity'  => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing salle serveur entity.
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response|null
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('controleaccespresenceAdminBundle:SalleServeur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find salle serveur entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('controleaccespresenceAdminBundle:salleserveur:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a employe entity.
     *
     * @param SalleServeur $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(SalleServeur $entity)
    {
        $form = $this->createForm(SalleServeurType::class, $entity, array(
            'action' => $this->generateUrl('salleserveur_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', SubmitType::class, array('label' => 'Mettre à jour',
            'attr' => array('class' => 'btn btn-primary pull-right')));
        return $form;
    }
    /**
     * Edits an existing employe entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('controleaccespresenceAdminBundle:SalleServeur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find salle serveur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            $session = $request->getSession();
            $session->getFlashBag()->add('info', 'salle serveur bien modifiée');
            return $this->redirect($this->generateUrl('salleserveur_edit', array('id' => $id)));
        }

        return $this->render('controleaccespresenceAdminBundle:salleserveur:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a employe entity.
     *
     */
    public function deleteAction(Request $request)
    {
        $id = $request->get('id');
        //$form = $this->createDeleteForm($id);
        //$form->handleRequest($request);

        //if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('controleaccespresenceAdminBundle:SalleServeur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find salle serveur entity.');
        }

        $em->remove($entity);
        $em->flush();
        //}

        return $this->redirect($this->generateUrl('salleserveur'));
    }

    /**
     * Creates a form to delete a salle serveur entity by id.
     *
     * @param int $id The entity id
     *
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('salleserveur_delete', array('id' => $id)))
            ->add('submit', SubmitType::class, array('label' => 'Oui',
                'attr' => array('class' => 'btn .btn-default pull-right')))->getForm()
            ;
    }


}