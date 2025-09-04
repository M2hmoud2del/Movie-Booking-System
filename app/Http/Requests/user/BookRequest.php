<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'selected_seats' => 'required|string',
            'movie_id' => 'required|exists:movies,id',
            'screen_id' => 'required|exists:screens,id',
            'showtime_id' => 'required|exists:showtimes,id', // actually showtime_id
            'payment_method' => 'required|in:cash,credit_card,wallet',
            ];
    }
    public function messages()
    {
        return [
            'selected_seats.required' => 'Please select at least one seat.',
            'movie_id.required' => 'Please select a movie.',
            'screen_id.required' => 'Please select a screen.',
            'showtime_id.required' => 'Please select a showtime.',
            'payment_method.required' => 'Please choose a payment method.'
        ];
    }
}
