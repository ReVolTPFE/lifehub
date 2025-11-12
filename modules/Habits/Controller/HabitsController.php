<?php

namespace LifeHub\Modules\Habits\Controller;

use LifeHub\Modules\Habits\HabitsModule;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HabitsController extends AbstractController
{
    public function __construct(
        private readonly HabitsModule $habitsModule
    )
    {
    }

    #[Route('/', 'app_modules_habits_index')]
    public function index(): Response
    {
        return $this->render('@Habits/index.html.twig');
    }
}
