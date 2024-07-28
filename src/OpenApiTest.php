<?php

namespace Project;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: '1.0.0',
    title: 'My API'
)]
class OpenApiTest
{
    #[OA\Get(
        path: "/api/data",
        responses: [
            new OA\Response(
                response: 200,
                description: "Returns data"
            )
        ]
    )]
    public function getData()
    {
        // Logic to fetch and return data
    }

    #[OA\Get(
        path: "/api/datascore",
        responses: [
            new OA\Response(
                response: 200,
                description: "Returns data"
            )
        ]
    )]
    public function getDataScore()
    {
        // Logic to fetch and return data
    }

}

