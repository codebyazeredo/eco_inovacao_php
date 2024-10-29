<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'start_event' => 'nullable|date',
            'end_event' => 'nullable|date|after_or_equal:start_event',
            'local' => 'required|string|max:255',
            'how_to_get' => 'required|string|max:255',
            'link_event' => 'required|url|max:255',
            'private_event' => 'boolean',
            'user_id' => 'required|exists:users,id',
            'address_id' => 'required|exists:addresses,id',
        ];
    }
}
