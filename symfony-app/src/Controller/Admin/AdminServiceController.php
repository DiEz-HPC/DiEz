<?php

namespace App\Controller\Admin;

use App\Entity\Calendar;
use App\Service\GithubApi;
use App\Service\templatePreview;
use App\Repository\CalendarRepository;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('/admin/service', name: 'admin_service_')]
class AdminServiceController extends AbstractController
{
    private Serializer $serializer;

    public function __construct()
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $this->serializer = new Serializer($normalizers, $encoders);
    }

    #[Route('/github', name: 'github')]
    public function index(GithubApi $githubApi): Response
    {
        // A faire : Gérer les message d'erreur
        if ($githubApi->saveRepos()) {
            $this->addFlash('success', 'Les répos ont bien été sauvegardés ou mis à jour');
        } else {
            $this->addFlash('danger', 'Aucune modification n\'a était apportée.');
        }
        return $this->redirectToRoute('admin_index');
    }

    #[route('/calendarGet', name: 'calendar_get')]
    public function calendar(CalendarRepository $calendarRepository)
    {
        $calendars = $calendarRepository->findAll();
        $calendars = $this->serializer->serialize($calendars, 'json');
        return new Response(
            content: $calendars,
            status: Response::HTTP_OK,
            headers: [
                'content-type' => 'application/json'
            ]
        );
    }

    #[Route('/calendarEdit', name: 'calendar_edit')]
    public function calendarEdit(Request $request, CalendarRepository $calendarRepository)
    {
        // Get data from request
        $requestData = $request->getContent();
        $eventId = json_decode($requestData)->id;

        $updatedEvent = $this->serializer->deserialize($requestData, Calendar::class, 'json');
       
        $savedEvent = $calendarRepository->findOneBy(['id' => $eventId]);
        $savedEvent->setTitle($updatedEvent->getTitle());
        $savedEvent->setStart($updatedEvent->getStart());
        $savedEvent->setEnd($updatedEvent->getEnd());
        $savedEvent->setColor($updatedEvent->getColor());

        $em = $this->getDoctrine()->getManager();
        $em->persist($savedEvent);
        $em->flush();
        return new Response(
            content: $this->serializer->serialize(['success' => 'Le calendrier a été mis à jour.'], 'json'),
            status: Response::HTTP_OK,
            headers: ['Content-Type' => 'application/json']
        );
    }

    #[Route('/calendarAdd', name: 'calendar_add')]
    public function calendarAdd(Request $request)
    {
        // Get data from request
        $requestData = $request->getContent();
        $newEvent = $this->serializer->deserialize($requestData, Calendar::class, 'json');
        $em = $this->getDoctrine()->getManager();
        $em->persist($newEvent);
        $em->flush();
        return new Response(
            content: $this->serializer->serialize(['success' => 'Le calendrier a été ajouté.'], 'json'),
            status: Response::HTTP_OK,
            headers: ['Content-Type' => 'application/json']
        );
    }

    #[Route('/calendarDelete', name: 'calendar_delete')]
    public function calendarDelete(Request $request, CalendarRepository $calendarRepository)
    {
        // Get data from request
        $requestData = $request->getContent();
        $event = $calendarRepository->findOneBy(['id' => $requestData]);
        $em = $this->getDoctrine()->getManager();
        $em->remove($event);
        $em->flush();
        return new Response(
            content: $this->serializer->serialize(['success' => 'Le calendrier a été supprimé.'], 'json'),
            status: Response::HTTP_OK,
            headers: ['Content-Type' => 'application/json']
        );
    }

    #[Route('/templatePreview/{id}', name: 'template_preview')]
    public function templatePreview(int $id, templatePreview $templatePreview)
    {
       $indexPath = $templatePreview->getTemplate($id);
       return new JsonResponse($indexPath);
    }
}
