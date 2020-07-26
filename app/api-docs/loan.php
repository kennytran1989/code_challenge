<?php
/**
 *  @OA\Post(
 *      path="/api/loan/create",
 *      summary="Create Loan for user",
 *      tags={"Loan"},
 *      @OA\RequestBody(
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  @OA\Property(property="amount",type="number"),
 *                  @OA\Property(property="loan_term",type="boolean"),
 *                  example={
 *                      "amount":3000000,
 *                      "loan_term":true
 *                  }
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response="200",
 *          description="Create Loan succesfully",
 *          @OA\MediaType(
 *          mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(property="status",type="string"),
 *                 example={
 *                      "status": true,
 *                      "message": "Create Loan Success",
 *                      "data": {
 *                          "user_id": 1,
 *                          "amount": 3000000,
 *                          "loan_term": true,
 *                          "updated_at": "2020-07-25 21:42:48",
 *                          "created_at": "2020-07-25 21:42:48",
 *                          "id": 6
 *                      }}
 *             )
 *          )
 *      ),
 *      security={{"Bearer": {}}}
 *  )
 *
 */


/**
 * @OA\Put(
 *     path="/api/admin/loan/update/{id}",
 *     tags={"Loan"},
 *     summary="Update Loan by id",
 *       @OA\Parameter(in="path",name="id",required=true,@OA\Schema(type="number")),
 *     @OA\RequestBody(
 *          description="Update status for loan by admin. Please use one in (waiting, approve, finish_repay) status to update",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  @OA\Property(property="status_loan",@OA\Schema(type="string",enum={"waiting", "approve", "finish_repay"})),
 *                  example={
 *                      "status_loan"      : "waiting, approve, finish_repay"
 *                  }
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response="200",
 *          description="Update Loan success",
 *          @OA\MediaType(
 *          mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(property="status",type="boolean"),
 *                 example={"status": "true", "data": ""}
 *             )
 *          )
 *      ),
 *      security={{"Bearer": {}}}
 *  )
 *
 */

/**
 * @OA\Get(
 *       path="/api/loan/{id}",
 *       tags={"Loan"},
 *       summary="Get loan's detail by id",
 *       description="Returns loan's detail",
 *       @OA\Parameter(in="path",name="id",required=true,@OA\Schema(type="number")),
 *       @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\MediaType(
 *          mediaType="application/json",
 *               @OA\Schema(
 *                   @OA\Property(property="status",type="boolean"),
 *                   example={
 *                       "status": "true",
 *                       "data":{{
 *                           "message": "Get loan's detail Success",
 *                           "data": {
 *                              "id": 1,
 *                              "user_id": 2,
 *                              "amount": "3000000.00",
 *                              "loan_term": 1,
 *                              "status_loan": "waiting",
 *                              "created_at": "2020-07-26 04:12:00",
 *                              "updated_at": "2020-07-26 04:12:00"
 *                            }
 *                       }}
 *                   }
 *               )
 *          )
 *       ),
 *       security={{"Bearer": {}}}
 * )
 */

/**
 * @OA\Put(
 *     path="/api/loan/repay/{id}",
 *     tags={"Loan"},
 *     summary="Repay Loan by id",
 *       @OA\Parameter(in="path",name="id",required=true,@OA\Schema(type="number")),
 *      @OA\Response(
 *          response="200",
 *          description="Repay Loan by id",
 *          @OA\MediaType(
 *          mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(property="status",type="boolean"),
 *                 example={
 *                  "status": true,
 *                  "message": "You pay for loan",
 *                  "data": {
 *                      "loan_id": 1,
 *                      "amount": 300000,
 *                      "status": true,
 *                      "updated_at": "2020-07-26 05:56:35",
 *                      "created_at": "2020-07-26 05:56:35",
 *                      "id": 3
 *                    }
 *                  }
 *             )
 *          )
 *      ),
 *      security={{"Bearer": {}}}
 *  )
 *
 */
