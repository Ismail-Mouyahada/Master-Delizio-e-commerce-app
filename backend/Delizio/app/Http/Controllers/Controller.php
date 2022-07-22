<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Delizio Documentation",
 *      description="Implementation of Swagger with in Delizio  Laravel APP",
 *      @OA\Contact(
 *          email="i.mouyahada@accessenergies.fr"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="API Server"
 * )

 *
 *
 */

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}