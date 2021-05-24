<?php

namespace App\Controller;

use App\Classe\Cart;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class StripeController extends AbstractController
{
    /**
     * @Route("/commande/create-session", name="stripe_create_session")
     */
    public function index(Cart $cart)
    {
        $products_for_stripe = [];
        $YOUR_DOMAIN = 'http://127.0.0.1:8000';

        foreach ($cart->getFull() as $product) {
            $products_for_stripe[] = [ // Affiche les produits que l'utilisateur veut acheter
                'price_data' => [
                    'currency' => 'eur',
                    'unit_amount' => $product['product']->getPrice(),
                    'product_data' => [
                        'name' => $product['product']->getName(),
                        'images' => [$YOUR_DOMAIN.'/uploads/'.$product['product']->getIllustration()],
                    ],
                ],
                'quantity' => $product['quantity'],
            ];
        }

        Stripe::setApiKey('sk_test_51IuZrDJwCpbOuVHxdsVxlWubISGNEky34Rlq1SyXGfBwPb5zWDyQX8DtqvjzvFSXafEEWvVSNtMvwIUwwSNZ2saU00OSPIa2BS'); // Clés API

        $checkout_session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                $products_for_stripe,
            ]],
            'mode' => 'payment', // Page de success et error
            'success_url' => $YOUR_DOMAIN.'/success.html',
            'cancel_url' => $YOUR_DOMAIN.'/cancel.html',
        ]);

        return new JsonResponse(['id' => $checkout_session->id]);
    }
}
