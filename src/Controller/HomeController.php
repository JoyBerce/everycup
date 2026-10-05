<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $storeInfo = [
            'name' => 'Metro Manila District Suites - G. Tolentino (UST)',
            'address' => '466, 1125 Tolentino St, Sampaloc, Manila, 1008 Metro Manila',
            'hours' => 'Monday – Saturday: 11:00 AM – 11:00 PM (Open Daily)',
            'maps_url' => 'https://maps.app.goo.gl/NEyinEc7bWAm3XcQA'
        ];

        return $this->render('home/index.html.twig', [
            'store' => $storeInfo,
        ]);
    }

    #[Route('/menu', name: 'app_menu')]
    public function menu(): Response
    {
        $menuCategories = [
            [
                'title' => '☕ Signature Coffee Series',
                'items' => [
                    ['name' => 'Every Cup Signature Latte', 'price' => '₱120', 'description' => 'Our flagship bold espresso with rich fresh milk and secret sweetener blend.'],
                    ['name' => 'Spanish Latte', 'price' => '₱135', 'description' => 'Layered espresso over sweet condensed milk, smooth and energizing.'],
                    ['name' => 'Sea Salt Caramel Macchiato', 'price' => '₱145', 'description' => 'Rich espresso, caramel drizzle, topped with a delicate hint of sea salt foam.'],
                    ['name' => 'Dark Mocha Chill', 'price' => '₱150', 'description' => 'Deep dark chocolate blended with espresso and milk over crushed ice.'],
                ]
            ],
            [
                'title' => '🧊 Non-Coffee & Refreshers',
                'items' => [
                    ['name' => 'Uji Matcha Cream', 'price' => '₱140', 'description' => 'Ceremonial grade Japanese green tea layered with sweet cream foam.'],
                    ['name' => 'Dark Belgian Choc', 'price' => '₱130', 'description' => 'Ultra-rich melted Belgian chocolate served iced or hot.'],
                    ['name' => 'Strawberry Hibiscus Fizz', 'price' => '₱110', 'description' => 'Refreshing tart hibiscus infusion with fresh sweet strawberry puree and soda.'],
                ]
            ],
            [
                'title' => '🥐 Pastries & Quick Bites',
                'items' => [
                    ['name' => 'Butter Croissant', 'price' => '₱85', 'description' => 'Flaky, golden-brown buttery pastry baked fresh daily.'],
                    ['name' => 'Cheesy Enaymado', 'price' => '₱95', 'description' => 'Soft sweet bread loaded with butter, sugar, and generous melted cheese.'],
                ]
            ]
        ];

        return $this->render('home/menu.html.twig', [
            'menu_categories' => $menuCategories,
        ]);
    }

    #[Route('/locations', name: 'app_locations')]
    public function locations(): Response
    {
        $storeInfo = [
            'name' => 'Metro Manila District Suites - G. Tolentino (UST)',
            'address' => '466, 1125 Tolentino St, Sampaloc, Manila, 1008 Metro Manila',
            'hours' => 'Monday – Saturday: 11:00 AM – 11:00 PM (Open Daily)',
            'maps_url' => 'https://maps.app.goo.gl/NEyinEc7bWAm3XcQA'
        ];

        return $this->render('home/locations.html.twig', [
            'store' => $storeInfo,
        ]);
    }

    #[Route('/delivery', name: 'app_delivery')]
    public function delivery(): Response
    {
        return $this->render('home/delivery.html.twig');
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('home/contact.html.twig');
    }

    #[Route('/faq', name: 'app_faq')]
    public function faq(): Response
    {
        return $this->render('home/faq.html.twig');
    }
}