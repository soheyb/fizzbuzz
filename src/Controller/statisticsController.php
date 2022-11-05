<?php

namespace App\Controller;

use App\Repository\StatisticsRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class  statisticsController extends AbstractController
{
    /**
     * Statistics route (New homepage)
     *
     * @Route("/statistics", name="statistics")
     * @param Request $request
     * @return JsonResponse
     */
    public function statistics(Request $request, ManagerRegistry $doctrine) : JsonResponse
    {
        $statsRepo = new StatisticsRepository($doctrine);
        $top = $statsRepo->top();
        if (is_null($top))
        {
            return new JsonResponse(
                array(
                    "error" => "empty data",
                ) ,
                Response::HTTP_BAD_REQUEST
            );
        }

        return new JsonResponse(
            array(
                "parameters" => json_decode($top["parameters"]),
                "count"=> $top["count"]
            ),

            Response::HTTP_OK
        );
    }
}