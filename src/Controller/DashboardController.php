<?php

namespace App\Controller;

use App\Admin\Service\SomeService;
use App\Entity\ContactDetail;
use App\Entity\Experience;
use App\Entity\Knowledge;
use App\Entity\Milestone;
use App\Entity\Profile;
use App\Entity\Section;
use App\Entity\SectionTitle;
use App\Entity\Service;
use App\Entity\Skill;
use App\Entity\SocialNetwork;
use App\Entity\Strength;
use App\Entity\WorkProcess;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Provider\AdminContextProvider;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $context = new SomeService();
        $context->getContext();
        dd($context);
        return parent::index();
    }

    public function someContext(AdminContext $adminContext): AdminContext
    {
        return $adminContext;
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('My CV Website')
            ;
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linktoDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('Contents'),
            MenuItem::linkToCrud('Profil', 'fa-home', Profile::class),
            MenuItem::linkToCrud('Services', 'fa-home', Service::class),
            MenuItem::linkToCrud('Coordonnées', 'fa-home', ContactDetail::class),
            MenuItem::linkToCrud('Compétences humaines', 'fa-home', Strength::class),
            MenuItem::linkToCrud('Compétences techniques', 'fa-home', Skill::class),
            MenuItem::linkToCrud('Connaissances techniques', 'fa-home', Knowledge::class),
            MenuItem::linkToCrud('Formations & XP', 'fa-home', Experience::class),
            MenuItem::linkToCrud('Etapes importantes', 'fa-home', Milestone::class),
            MenuItem::linkToCrud('Cadre de travail', 'fa-home', WorkProcess::class),
            MenuItem::linkToCrud('Réseaux sociaux', 'fa-home', SocialNetwork::class),

            MenuItem::section('Structure'),
            MenuItem::linkToCrud('Sections', 'fa-home', Section::class),
            MenuItem::linkToCrud('Titres', 'fa-home', SectionTitle::class),
        ];
    }
}
