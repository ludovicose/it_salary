<?php
declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

final class ErrorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'jsonrpc' => '2.0',
            'error' => [
                'code' => $this['code'],
                'message' => $this['message']
            ]
        ];
    }
}
