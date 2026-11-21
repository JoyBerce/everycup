<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(): Response
    {
        $featuredProducts = [
            ['name' => 'Spanish Latte', 'description' => 'A smooth espresso blended with creamy milk and a touch of sweetness.', 'price' => '₱120', 'image' => 'images/1 (1).jpg', 'category' => 'BEST SELLER'],
            ['name' => 'Matcha Latte', 'description' => 'A refreshing combination of earthy matcha and creamy milk.', 'price' => '₱130', 'image' => 'images/1 (2).jpg', 'category' => 'CUSTOMER FAVORITE'],
            ['name' => 'Mocha', 'description' => 'Rich chocolate and espresso blended into one comforting cup.', 'price' => '₱125', 'image' => 'images/1 (3).jpg', 'category' => 'MUST TRY'],
        ];
        return $this->render('home/index.html.twig', ['featuredProducts' => $featuredProducts, 'location' => 'G. Tolentino Street, Sampaloc, Manila, Philippines', 'businessName' => 'every cup.']);
    }

    #[Route('/menu', name: 'app_menu', methods: ['GET'])]
    public function menu(): Response { return $this->render('home/menu.html.twig', ['menuItems' => $this->menuItems()]); }

    #[Route('/visit-us', name: 'app_visit', methods: ['GET'])]
        public function visit(): Response { return $this->render('home/visit.html.twig', [
        'store' => [
            'name' => 'every cup.',
            'address' => 'Metro Manila District Suites, 466, 1125 Tolentino St, Sampaloc, Manila',
            'hours' => 'Daily, check store hours',
            'maps_url' => 'https://maps.google.com/?q=14.604,120.988',
        ],
    ]);; }

    #[Route('/order-online', name: 'app_order_online', methods: ['GET'])]
    public function orderOnline(): Response { return $this->render('home/order_online.html.twig'); }

    #[Route('/book-the-bar', name: 'app_book_bar', methods: ['GET'])]
    public function bookTheBar(): Response { return $this->render('home/book_bar.html.twig'); }

    #[Route('/delivery', name: 'app_delivery')]
    public function delivery(): Response { return $this->redirectToRoute('app_order_online'); }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response { return $this->redirectToRoute('app_home', ['_fragment' => 'contact']); }

    #[Route('/faq', name: 'app_faq')]
    public function faq(): Response { return $this->render('home/faq.html.twig'); }

    private function menuItems(): array
    {
        return [
            ['name' => 'Spanish Latte', 'category' => 'Espresso-Based', 'notes' => 'Silky milk, brown sugar, double espresso.', 'price' => 120, 'image' => 'images/1 (1).jpg'],
            ['name' => 'Iced Americano', 'category' => 'Cold Brew', 'notes' => 'Bright, bold and clean over crystal ice.', 'price' => 95, 'image' => 'images/1 (2).jpg'],
            ['name' => 'Matcha Cloud', 'category' => 'Non-Coffee', 'notes' => 'Ceremonial matcha, vanilla cream, soft finish.', 'price' => 130, 'image' => 'images/1 (3).jpg'],
            ['name' => 'Dark Mocha', 'category' => 'Espresso-Based', 'notes' => 'Cacao, espresso and steamed milk.', 'price' => 125, 'image' => 'images/1 (1).jpg'],
            ['name' => 'Strawberry Oat', 'category' => 'Seasonal Specials', 'notes' => 'Berry compote, oat milk and a rosy finish.', 'price' => 145, 'image' => 'images/1 (2).jpg'],
            ['name' => 'Cold Brew Tonic', 'category' => 'Cold Brew', 'notes' => 'Slow-steeped coffee, citrus tonic, orange peel.', 'price' => 135, 'image' => 'images/1 (3).jpg'],
        ];
    }
}
