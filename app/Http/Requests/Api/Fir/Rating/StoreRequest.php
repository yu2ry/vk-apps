<?php

namespace App\Http\Requests\Api\Fir\Rating;

use App\Models\Social;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class StoreRequest
 * @package App\Http\Requests\Api\Fir\Rating
 */
class StoreRequest extends FormRequest
{

    const FIELD_SOCIAL_TYPE = 'social_type';
    const FIELD_SOCIAL_ID = 'social_id';

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
            self::FIELD_SOCIAL_TYPE => [
                'required',
                Rule::in(Social::getSocials())
            ],
            self::FIELD_SOCIAL_ID => 'required|integer'
        ];
    }

    /**
     * @return int
     */
    public function getSocialType(): int
    {
        return $this->request->get(self::FIELD_SOCIAL_TYPE);
    }

    /**
     * @return int
     */
    public function getSocialId(): int
    {
        return $this->request->get(self::FIELD_SOCIAL_ID);
    }
}
