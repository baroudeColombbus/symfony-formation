<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;


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
}
