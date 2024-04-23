<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NameVariationController extends AbstractController {

    #[Route('/', name: 'Name_variation')]
    public function index(Request $request) {
        $name = $request->query->get('name', '');

        if (!empty($name)) {
            $nameDetails = [
                'number_of_characters' => strlen($name),
                'first_character' => $name[0],
                'last_character' => $name[-1],
                'lower_case' => strtolower($name),
                'upper_case' => strtoupper($name)
            ];
        }

        return $this->render('name_variation/index.html.twig', [
            'name' => $name,
            'nameDetails' => $nameDetails ?? []
        ]);
    }
}
