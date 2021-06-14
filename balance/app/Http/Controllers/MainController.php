<?php

namespace App\Http\Controllers;

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

            list($class, $method) = Str::of($content['method'])->explode('.');

            $service = app()->make($class);

            $result = call_user_func_array([$service, $method], $content['params']);

        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
}
