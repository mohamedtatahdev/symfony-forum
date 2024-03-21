<?php

namespace App\Controller;

use App\Form\QuestionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(Request $request): Response
    {
           //formulaire question
           $formQuestion = $this->createForm(QuestionType::class);
           $formQuestion->handleRequest($request);
   
       if ($formQuestion->isSubmitted() && $formQuestion->isValid()) {
         dump($formQuestion->getData());
       }
   
       $questions = [
        [
          'id' => '1',
          'title' => 'Je suis une super question',
          'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, adipisci. Libero aperiam dolores excepturi, quidem maxime accusantium inventore. Illum, odio dolores! Ullam omnis veritatis laborum, animi inventore nostrum optio voluptates.',
          'rating' => 20,
          'author' => [
            'name' => 'Jean Dupont',
            'avatar' => 'https://randomuser.me/api/portraits/men/52.jpg'
          ],
          'nbrOfResponse' => 15
        ],
        [
          'id' => '1',
          'title' => 'Je suis une super question',
          'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, adipisci. Libero aperiam dolores excepturi, quidem maxime accusantium inventore. Illum, odio dolores! Ullam omnis veritatis laborum, animi inventore nostrum optio voluptates.',
          'rating' => 20,
          'author' => [
            'name' => 'Jean Dupont',
            'avatar' => 'https://randomuser.me/api/portraits/men/52.jpg'
          ],
          'nbrOfResponse' => 15
        ],
        [
          'id' => '1',
          'title' => 'Je suis une super question',
          'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, adipisci. Libero aperiam dolores excepturi, quidem maxime accusantium inventore. Illum, odio dolores! Ullam omnis veritatis laborum, animi inventore nostrum optio voluptates.',
          'rating' => -20,
          'author' => [
            'name' => 'Jean Dupont',
            'avatar' => 'https://randomuser.me/api/portraits/men/52.jpg'
          ],
          'nbrOfResponse' => 15
        ],
      ];
       return $this->render('home/index.html.twig', [
         'form' => $formQuestion->createView(),
         'questions' => $questions

       ]);
    }
}
