<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Livre;
use App\Entity\Auteur;
use App\Entity\Editeur;
use App\Entity\Genre;
use App\Entity\Nationnalite;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {

        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('API Crud create');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('LivreController', 'fa fa-tags', Livre::class);
        // yield MenuItem::linkToCrud('Auteur', 'fa fa-tags', Auteur::class);
        // yield MenuItem::linkToCrud('Editeur', 'fa fa-tags', Editeur::class);
        // yield MenuItem::linkToCrud('Genre', 'fa fa-tags', Genre::class);
        // yield MenuItem::linkToCrud('Nationnalite', 'fa fa-tags', Nationnalite::class);
    }
}
