<?php

namespace App\Http\Requests\Api\Fir;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class IndexRequest
 * @package App\Http\Requests\Api\Fir
 */
class IndexRequest extends FormRequest
{

    const PARAM_VIEWER_ID = 'viewer_id';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            self::PARAM_VIEWER_ID => 'required|integer'
        ];
    }

    /**
     * @return int
     */
    public function getViewerId(): int
    {
        return $this->query->get(self::PARAM_VIEWER_ID);
    }
}
