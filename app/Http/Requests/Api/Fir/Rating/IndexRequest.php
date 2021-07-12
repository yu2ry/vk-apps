<?php

namespace App\Http\Requests\Api\Fir\Rating;

use App\Models\RatingUser;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class IndexRequest
 * @package App\Http\Requests\Api\Fir\Rating
 */
class IndexRequest extends FormRequest
{

    const FIELD_TYPE = 'type';
    const FIELD_PAGE = 'page';
    const FIELD_NEXT = 'next';

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
            self::FIELD_TYPE => [
                'required',
                Rule::in(RatingUser::types())
            ],
            self::FIELD_PAGE => 'required|integer|min:1'
        ];
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->query->get(self::FIELD_TYPE);
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->query->get(self::FIELD_PAGE);
    }
}
