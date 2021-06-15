<?php

namespace App\Http\Requests;

use App\DTO\UserBalanceDTO;
use Illuminate\Foundation\Http\FormRequest;

class ShowCurrentBalanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'params.user_id' => 'required'
        ];
    }

    public function getDTO()
    {
        return UserBalanceDTO::fromRequest($this);
    }
}
