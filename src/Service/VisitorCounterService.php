<?php

namespace App\Service;

use DateTimeZone;
use DateTimeImmutable;
use App\Entity\VisitorCounter;
use App\Repository\VisitorCounterRepository;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\RequestStack;

class VisitorCounterService
{
    public function __construct(
        private RequestStack $request,
        private VisitorCounterRepository $visitorCounterRepository,
        private EntityManagerInterface $em
        ){
            
        }

    public function getVisitorCounter(): null|bool
    {
        $ipVisitor = $this->request->getCurrentRequest()->server->get('REMOTE_ADDR');
        $date = new DateTimeImmutable('', new DateTimeZone('Europe/Paris'));
        $visitors = $this->visitorCounterRepository->findBy(['IpAdress' => $ipVisitor]);

        foreach ($visitors as $oldVisitor) {
            if ($oldVisitor->getDate()->format('d/m/Y') === $date->format('d/m/Y')) {
                return null;
            }
        }

        $visitor = new VisitorCounter();
        $visitor->setIpAdress($ipVisitor);
        $visitor->setDate($date);

        $this->em->persist($visitor);
        $this->em->flush();

        return true;
    }
}
