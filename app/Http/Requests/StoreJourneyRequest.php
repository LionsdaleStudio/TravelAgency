<?php

namespace App\Http\Requests;

use App\Models\Journey;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreJourneyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool //Ki mit csinálhat tárolás ügyében
    {
        //Fejlesztési célzattal nem használunk engedélyezést, ezért return true
        //Mindenkinek lehet a store funkciót futtatni

        //Ha van kész policy
        if (auth()->check()) { //a user() funció null-t ad vissza, azon a can nem fut le
            Auth::user()->can("create", Journey::class);
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {   //Ha az input mezők megfelelnek a validációnak, megyünk a store() funkcióra
        //Ha nem felelnek meg, akkor kigyűjti az errorokat egy $errors tömbbe és visszaküldi a frontend create pagere.
        return [
            "name" => ["required", "string", "max:255", "unique:journeys,name"], //new age
            "price" => "required|integer|min:0", //old school
            "travel_time" => ["required", "numeric", "min:0"],
            "visa" => ["boolean"],
            "description" => ["string", "required"]
        ];
    }

    public function messages()
    { /* A különböző error üzenetek személyre szabása */
        return [
            "name.required" => "A név mező kitöltése kötelező"
        ];
    }
}
