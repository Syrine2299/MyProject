<?php


namespace controleaccespresence\AdminBundle\Controller;

use controleaccespresence\AdminBundle\Entity\Calendar;
use controleaccespresence\AdminBundle\Form\CalendarType;
use controleaccespresence\AdminBundle\Repository\CalendarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/calendar")
 */
class CalendarController extends AbstractController
{
    /**
     * @Route("/", name="calendar_index", methods={"GET"})
     * @return Response|null
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('controleaccespresenceAdminBundle:Calendar')->findAll();
        return $this->render('controleaccespresenceAdminBundle:calendar:index.html.twig', array(
            'calendars'      => $entities,


        ));

    }

    /**
     * @Route("/new", name="calendar_new", methods={"GET","POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response|null
     */
    public function newAction(Request $request)
    {
        $calendar = new Calendar();
        $form = $this->createForm(CalendarType::class, $calendar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($calendar);
            $entityManager->flush();

            return $this->redirectToRoute('event');
        }


        return $this->render('controleaccespresenceAdminBundle:calendar:new.html.twig', array(
            'calendar' => $calendar,
            'form'   => $form->createView(),
        ));
    }

    /**
     * @Route("/{id}", name="calendar_show", methods={"GET"})
     * @param Calendar $calendar
     * @return Response|null
     */
    public function showAction(Calendar $calendar)
    {

        return $this->render('controleaccespresenceAdminBundle:calendar:show.html.twig', array(
            'calendar'  => $calendar
        ));
    }

    /**
     * @Route("/{id}/edit", name="calendar_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Calendar $calendar
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response|null
     */
    public function editAction(Request $request, Calendar $calendar)
    {
        $form = $this->createForm(CalendarType::class, $calendar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('event');
        }


        return $this->render('controleaccespresenceAdminBundle:calendar:edit.html.twig', array(
            'calendar'      => $calendar,
            'form'   => $form->createView(),
        ));
    }

    /**
     * @Route("/{id}", name="calendar_delete", methods={"DELETE"})
     * @param Request $request
     * @param Calendar $calendar
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, Calendar $calendar)
    {
        if ($this->isCsrfTokenValid('delete'.$calendar->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($calendar);
            $entityManager->flush();
        }

        return $this->redirectToRoute('event');
    }
}