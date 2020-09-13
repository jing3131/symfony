<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/number/{max}", name="app_lucky_number")
     */
    public function number($max)
    {
        $number = random_int(0, $max);
        
        // return new Response(
        //     "Lucky number:".$number
        // );

        return $this->render("/lucky/number.html.twig",[
            "number" => $number
        ]);
        
    }

    /**
     * @Route("lucky")
     */
    public function index()
    {
        $url = $this->generateUrl("app_lucky_number", ["max" => 10]);
        // does a permanent - 301 redirect
        // return $this->redirectToRoute('homepage', [], 301);

        return $this->redirectToRoute("app_lucky_number", ["max" => 10]);           // 重新導向置Route

        // return $this->redirect("https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjlj7fjz-DrAhUGGKYKHfHqDKoQFjABegQIAhAB&url=https%3A%2F%2Fsymfony.com%2Fdoc%2F3.3%2Fsetup.html&usg=AOvVaw3hciLUz9hukGbKWxX3UcX6");
        // 重新導向置外部
    }
}

?>