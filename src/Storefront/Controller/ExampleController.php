<?php declare(strict_types=1);

namespace BasicPlugin\Storefront\Controller;

use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Storefront\Controller\StorefrontController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(defaults: ['_routeScope' => ['storefront']])]
class ExampleController extends StorefrontController
{
    #[Route(
        path: '/example',
        name: 'frontend.example.example',
        methods: ['GET']
    )]
    public function showExample(Request $request, SalesChannelContext $context): Response
    {

        $name         = 'Haben Habtom';
        $randomNumber = rand(0, 999);

        $day = "2";

        switch ($day){
            case "1":
                echo"monday";
                break;
                case "2":
                    echo "tusday";
                    break;
                    case "3":
                        echo "thersday";

                        break;

                        default:
                        echo "no";
                    }

                      $marks = 40;

                        if ($marks>=60)
                        {
                            $grade = "First Division";
                        }
                        else if($marks>=45)
                        {
                            $grade = "Second Division";
                        }
                        else if($marks>=33)
                        {
                            $grade = "Third Division";
                        }
                        else
                        {
                            $grade = "Fail";
                        }
                        
                        echo "Student grade: $grade";




        $number = 324;
        if ($number > 0)
        {
            echo $number . " is a positive number";
        } else if ($number < 0)
        {
            echo $number . " is a negative number ";
        } else if ($number == 0)
        {
            echo "You have entered zero";
        } else {
            echo " please enter a numeric value";
        }

            



        return  $this->render('@IsBasicPlugin/storefront/page/example.html.twig', [
            'name'         => $name,
            'randomNumber' => $randomNumber,
        ]);
    }
}
