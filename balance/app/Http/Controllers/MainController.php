<?php

namespace App\Http\Controllers;

use App\Http\Resources\ErrorResource;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public function __invoke(Request $request)
    {
        try {
            $content = json_decode($request->getContent(), true);

            if (empty($content)) {
                throw new Exception('Parse error');
            }

            $method = Str::replace('.', '@', $content['method']);

            return app()->call($method);

        } catch (Exception $exception) {
            return new ErrorResource([
                'code' => $exception->getCode(),
                'message' => $exception->getMessage()
            ]);
        }
    }
}
