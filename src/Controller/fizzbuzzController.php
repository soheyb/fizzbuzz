<?php

namespace App\Controller;

use App\Controller\Application\FizzbuzzLeboncoin;
use App\Controller\Logic\Rule;
use App\Controller\Logic\RulesList;
use App\Controller\Values\Number;
use App\Controller\Values\Word;
use App\Controller\Logic\RangeIterator;
use App\Entity\Statistics;
use App\Repository\StatisticsRepository;
use App\Utils\Checker;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ManagerRegistry;

class fizzbuzzController extends AbstractController
{


    /**
     * Main route (New homepage)
     *
     * @Route("/", name="fizzbuzz")
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request , ManagerRegistry $doctrine)
    {


        if(Checker::arrayCompare(array(
                "int1",
                "int2",
                "word1",
                "word2",
                "limit"
            ), $_GET) === false)
        {

            return new JsonResponse(
                array(
                    "error" => "wrong parameters",
                ),
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
        /*
         * Get parameters
         */
        $int1 = $request->get("int1");
        $int2 = $request->get("int2");
        $limit = $request->get("limit");
        $word1 = $request->get("word1");
        $word2 = $request->get("word2");

        /*
         * set needed instances
         */
        $start=new Number(1);
        $end= new Number($limit);
        $fizz = new Word($word1);
        $buzz = new Word($word2);
        $nb1 = new Number($int1);
        $nb2 = new Number($int2);
        $rule1 = new Rule($nb1, $fizz);
        $rule2 = new Rule($nb2, $buzz);
        $rules =new RulesList([
            $rule1,
            $rule2
        ]);

        $iterator = new RangeIterator($start, $end);
        $fizzBuzz =new FizzbuzzLeboncoin($iterator, $rules);
        $generatedString = $fizzBuzz->generate();


        /*
         * add to the statistics
         */
        $stats = new Statistics(json_encode($request->query->all()));
        $statsRepo = new StatisticsRepository($doctrine);
        $statsRepo->add($stats);

        return new JsonResponse(
            array(
                "fizzbuzz" => $generatedString,
            ),
            Response::HTTP_OK
        );
    }

}