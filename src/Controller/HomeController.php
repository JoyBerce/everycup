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
            ['name' => 'Spanish Latte', 'category' => 'Coffee', 'tag' => 'BEST SELLER', 'notes' => 'Smooth espresso with silky milk and a sweet finish.', 'price' => 99, 'image' => 'images/menu/11fbba92-84d9-4ff3-be32-67f5557835b9 (1).jpeg'],
            ['name' => 'Ube Matcha', 'category' => 'Matcha Series', 'tag' => 'SPECIAL', 'notes' => 'Earthy matcha layered with creamy ube.', 'price' => 170, 'image' => 'images/menu/11fbba92-84d9-4ff3-be32-67f5557835b9.jpeg'],
            ['name' => 'Cloud Cream Matcha', 'category' => 'Matcha Series', 'tag' => 'MATCHA', 'notes' => 'Matcha topped with a soft cream cloud.', 'price' => 180, 'image' => 'images/menu/24108ef9-c5d0-4d5e-bc4e-ae0e5acdebb4.jpeg'],
            ['name' => 'Dirty Matcha', 'category' => 'Matcha Series', 'tag' => 'SPECIAL', 'notes' => 'Matcha layered with a shot of espresso.', 'price' => 190, 'image' => 'images/menu/5051b42d-6673-43e4-bb59-048a7cea3889.jpeg'],
            ['name' => 'Iced Americano', 'category' => 'Coffee', 'tag' => 'CLASSIC', 'notes' => 'Bright, bold and clean over crystal ice.', 'price' => 95, 'image' => 'images/menu/59ea135a-2bae-4ae5-8f3d-6c8b65222cd7 (1).jpeg'],
            ['name' => 'Spanish Mocha', 'category' => 'Sweet & Strong', 'tag' => 'BEST SELLER', 'notes' => 'Chocolate, espresso and sweet creamy milk.', 'price' => 125, 'image' => 'images/menu/59ea135a-2bae-4ae5-8f3d-6c8b65222cd7.jpeg'],
            ['name' => 'Matcha Latte', 'category' => 'Matcha Series', 'tag' => 'MATCHA', 'notes' => 'Creamy premium matcha with a mellow finish.', 'price' => 150, 'image' => 'images/menu/64e0287c-89a1-434f-af7c-022d5debbc3f.jpeg'],
            ['name' => 'Creamy Latte', 'category' => 'Creamy Series', 'tag' => 'CREAMY', 'notes' => 'A gentle espresso latte made extra smooth.', 'price' => 120, 'image' => 'images/menu/6eefda9d-23b0-4056-918b-5c5bc2e9a529.jpeg'],
            ['name' => 'Strawberry Matcha', 'category' => 'Specials', 'tag' => 'SPECIAL', 'notes' => 'Fresh strawberry sweetness meets matcha.', 'price' => 165, 'image' => 'images/menu/84ace1a5-e4d7-4bc6-810f-84a04139f04e.jpeg'],
            ['name' => 'Dark Chocolate', 'category' => 'Non-Coffee', 'tag' => 'CREAMY', 'notes' => 'Rich cocoa with a deep, comforting finish.', 'price' => 130, 'image' => 'images/menu/8b164a42-822c-47f6-9edb-b9644dec4af6.jpeg'],
            ['name' => 'Caramel Macchiato', 'category' => 'Sweet & Strong', 'tag' => 'SPECIAL', 'notes' => 'Velvety milk, espresso and caramel drizzle.', 'price' => 140, 'image' => 'images/menu/b02344a0-4bb1-4a51-bc33-c5f5f3bef590.jpeg'],
            ['name' => 'Vanilla Cream Cold Brew', 'category' => 'Coffee', 'tag' => 'COLD', 'notes' => 'Slow-steeped coffee with vanilla cream.', 'price' => 145, 'image' => 'images/menu/b1a6c3fb-d3d8-4448-815a-6e586ee919af.jpeg'],
            ['name' => 'Sea Salt Latte', 'category' => 'Creamy Series', 'tag' => 'CREAMY', 'notes' => 'A balanced latte finished with sea salt cream.', 'price' => 135, 'image' => 'images/menu/b649037f-6707-41de-9daa-bd46ae38d6dd.jpeg'],
            ['name' => 'Cold Brew Tonic', 'category' => 'Coffee', 'tag' => 'COLD', 'notes' => 'Slow-steeped coffee with a bright citrus lift.', 'price' => 135, 'image' => 'images/menu/c2d9ba3e-18f1-40ad-822c-2c31973160b7.jpeg'],
            ['name' => 'Strawberry Cream', 'category' => 'Specials', 'tag' => 'SPECIAL', 'notes' => 'Berry cream with a light, sweet finish.', 'price' => 150, 'image' => 'images/menu/c39556de-ec1d-429e-bb9c-47cbbb3031b5.jpeg'],
            ['name' => 'Matcha Cream Top', 'category' => 'Matcha Series', 'tag' => 'MATCHA', 'notes' => 'Bright matcha finished with airy cream.', 'price' => 160, 'image' => 'images/menu/dfc0f892-1cee-41cb-ba94-342fb5687622.jpeg'],
            ['name' => 'Signature Milk Tea', 'category' => 'Non-Coffee', 'tag' => 'CREAMY', 'notes' => 'Creamy tea with a soft caramel note.', 'price' => 120, 'image' => 'images/menu/ec81977e-5222-4b72-9485-4a769b9c2b18 (1).jpeg'],
            ['name' => 'Cocoa Espresso', 'category' => 'Sweet & Strong', 'tag' => 'STRONG', 'notes' => 'Bold espresso and chocolate in one cup.', 'price' => 130, 'image' => 'images/menu/f1714f08-c80a-4841-b782-dfa29018afd3 (1).jpeg'],
        ];
    }
}
