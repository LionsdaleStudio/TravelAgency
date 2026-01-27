<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateJourneyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required", "string", "max:255", "unique:journeys,name,{$this->journey->id}"], //new age
            /*  "name" => ["required", "string", "max:255", Rule::unique("journeys", "name")->ignore($this->journey->id)], */
            "price" => "required|integer|min:0", //old school
            "travel_time" => ["required", "numeric", "min:0"],
            "visa" => ["boolean"],
            "description" => ["string", "required"],
            "agency_id" => ["required", "between:1,3"]

        ];
    }
}
