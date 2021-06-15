<?php
declare(strict_types=1);

namespace App\Http\Requests;

use App\DTO\UserBalanceHistoryDTO;
use Illuminate\Foundation\Http\FormRequest;

final class ShowBalanceHistoryRequest extends FormRequest
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
        return UserBalanceHistoryDTO::fromRequest($this);
    }
}
