<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
            'ticket_type'          => 'required|in:general,vip,group',
            'customer_name'        => 'required|string|max:255',
            'customer_email'       => 'required|email:rfc,dns',
            'number_of_tickets'    => 'required|integer|min:1',

            'seat_preference'      => 'required_if:ticket_type,general|nullable|string',
            'backstage_access'     => 'required_if:ticket_type,vip|nullable|boolean',
            'complimentary_drinks' => 'required_if:ticket_type,vip|nullable|boolean',
            'group_name'           => 'required_if:ticket_type,group|nullable|string|max:255',
            'special_requests'     => 'required_if:ticket_type,group|nullable|string|max:30',
        ];
    }
}
