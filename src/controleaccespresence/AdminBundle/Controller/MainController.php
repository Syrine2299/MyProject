<?php


namespace controleaccespresence\AdminBundle\Controller;

use controleaccespresence\AdminBundle\Entity\Calendar;
use controleaccespresence\AdminBundle\Repository\CalendarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     * @param CalendarRepository $calendar
     * @return \Symfony\Component\HttpFoundation\Response|null
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $events = $em->getRepository('controleaccespresenceAdminBundle:Calendar')->findAll();


        $rdvs = [];

        foreach($events as $event){
            $rdvs[] = [
                'id' => $event->getId(),
                'start' => $event->getStart()->format('Y-m-d H:i:s'),
                'end' => $event->getEnd()->format('Y-m-d H:i:s'),
                'title' => $event->getTitle(),
                'description' => $event->getDescription(),
                'backgroundColor' => $event->getBackgroundColor(),
                'borderColor' => $event->getBorderColor(),
                'textColor' => $event->getTextColor(),
            ];
        }

        $data = json_encode($rdvs);

        return $this->render('controleaccespresenceAdminBundle:main:index.html.twig', compact('data'));
    }
}