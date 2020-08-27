<?php


namespace App\Controller;


use App\DataFixtures\KnowledgeFixtures;
use App\Repository\ContactDetailRepository;
use App\Repository\ExperienceRepository;
use App\Repository\KnowledgeRepository;
use App\Repository\MilestoneRepository;
use App\Repository\ProfileRepository;
use App\Repository\ServiceRepository;
use App\Repository\SkillRepository;
use App\Repository\SocialNetworkRepository;
use App\Repository\StrengthRepository;
use App\Repository\WorkProcessRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use \Symfony\Component\HttpFoundation\Response;

class PublicController extends AbstractController
{
    /**
     * @Route(path="/", name="public_homepage")
     * @return Response
     */
    public function homepage(
        ProfileRepository $profileRepository,
        ServiceRepository $serviceRepository,
        StrengthRepository $strengthRepository,
        ExperienceRepository $experienceRepository,
        SkillRepository $skillRepository,
        KnowledgeRepository $knowledgeRepository,
        MilestoneRepository $milestoneRepository,
        WorkProcessRepository $workProcessRepository,
        ContactDetailRepository $contactDetailRepository,
        SocialNetworkRepository $networkRepository
    ): Response
    {
        $allExperiences = $experienceRepository->findAll();
        return $this->render(
            'public/homepage.html.twig',
            [
                'profile' => $profileRepository->findAll()[0],
                'services' => $serviceRepository->findAll(),
                'strengths' => $strengthRepository->findAll(),
                'educations' => array_filter($allExperiences, static function($experience) {
                    if ($experience->getType() === 'education') {
                        return $experience;
                    }
                }),
                'work_experiences' => array_filter($allExperiences, static function($experience) {
                    if ($experience->getType() === 'work') {
                        return $experience;
                    }
                }),
                'freelance_experiences' => array_filter($allExperiences, static function($experience) {
                    if ($experience->getType() === 'freelance') {
                        return $experience;
                    }
                }),
                'skills' => $skillRepository->findAll(),
                'knowledges' => $knowledgeRepository->findAll(),
                'milestones' => $milestoneRepository->findAll(),
                'work_process' => $workProcessRepository->findAll(),
                'contact_details' => $contactDetailRepository->findAll(),
                'social_networks' => $networkRepository->findAll()
            ]
        );
    }
}
