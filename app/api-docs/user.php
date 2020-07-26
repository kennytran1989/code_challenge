<?php
/**
 * @OA\Info(title="Code Challenge APIS", version="0.1")
 */

/**
 *  @OA\Post(
 *      path="/api/auth/login",
 *      summary="Login",
 *      tags={"Auth"},
 *      @OA\RequestBody(
 *      description="Please use info to login for test
 *                      Admin: email :admin@gmail.com, password:123456
 *                      User: email :kennyhuy@gmail.com, password:123456",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  @OA\Property(property="email",type="email"),
 *                  @OA\Property(property="password",type="string"),
 *                  example={
 *                      "email"     : "admin@gmail.com",
 *                      "password"  : "123456",
 *                  }
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response="200",
 *          description="Response accesstoken when login successfully",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                 @OA\Property(property="success",type="boolean"),
 *                 @OA\Property(property="data",type="text"),
 *                 example={"success": "true", "data" : {"token" : "access token string"}}
 *             )
 *        )
 *   ),
 *   security={{"Bearer": {}}}
 *  )
 */
