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
    /**
     * Get Data 
     * Logic to fetch and return data
     */
    public function getData()
    {
        return json_encode(['API', 'DATA']);
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
    /**
     * Get DataScore
     * Logic to fetch and return data
     */
    public function getDataScore()
    {
        return json_encode(['API', 'DATASCORE']);
    }

}

