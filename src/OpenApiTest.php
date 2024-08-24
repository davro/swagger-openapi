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
        operationId: "getData",
        responses: [
            new OA\Response(
                response: 200,
                description: "Returns data"
            )
        ]
    )]
    /**
     * Get Data by ID
     * Logic to fetch and return data
     */
    public function getData()
    {
        return json_encode(['API', 'DATA']);
    }


    #[OA\Get(
        path: "/api/data/{id}",
        operationId: "getDataById",
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: "Returns data by id"
            )
        ]
    )]
    /**
     * Get Data by ID
     * Logic to fetch and return data
     */
    public function getDataById(int $id)
    {
        return json_encode(['API', 'DATA', 'ID' => $id]);
    }


    #[OA\Get(
        path: "/api/datascore",
        operationId: "getDataScore",
        responses: [
            new OA\Response(
                response: 200,
                description: "Returns dataiscore"
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


    #[OA\Get(
        path: "/api/datascore/{score}",
        operationId: "getDataScoreByScore",
        parameters: [
            new OA\Parameter(
                name: "score",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: "Returns datascore by score"
            )
        ]
    )]

    /**
     * Get DataScore by Score
     */
    public function getDataScoreByScore(int $score)
    {
        return json_encode(['API', 'DATASCORE', 'Score' => $score]);
    }

}

