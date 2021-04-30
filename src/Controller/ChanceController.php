<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ChanceController
{

    public function getNumber()
    {
        $number = rand(0, 100);
        return new Response(
            "<html>
                        <body>
                                                    <h1>le numéro de la change est {$number}</h1>

                        </body>
        </html>"
        );
    }

    /**
     * @Route(path="/chance/analyse", name= "chance_analyse")
     */
    public function analyseRequete(Request $requete){
        return new Response(
            "<html>
                        <body>
                                                    <p>le contenu de la requête dans le dump </p>
                                        <form action=\"POST\" action=\"/requete_posyt\">
                                        <input type=\" text\" value=\"baroude\" name=\"prenom\">
                                        <input type=\"submit\">
                                        </form>
                        </body>
        </html>"
        );

    }
}
