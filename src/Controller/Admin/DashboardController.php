<?php

namespace App\Controller\Admin;

// Core
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
// Entities
use App\Entity\Expansion;
use App\Entity\Guide;
use App\Entity\Profession;
use App\Entity\User;

/**
 * @isGranted("ROLE_ADMIN")
 */
class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('How Much!');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Expansions', 'fas fa-cookie', Expansion::class);
        yield MenuItem::linkToCrud('Guides', 'fas fa-cookie', Guide::class);
        yield MenuItem::linkToCrud('Professions', 'fas fa-cookie', Profession::class);
        yield MenuItem::linkToCrud('User', 'fas fa-cookie', User::class);
    }
}
