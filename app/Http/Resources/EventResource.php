<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'start_event' => $this->start_event,
            'end_event' => $this->end_event,
            'local' => $this->local,
            'how_to_get' => $this->how_to_get,
            'link_event' => $this->link_event,
            'private_event' => $this->private_event,
            'user' => new UserResource($this->whenLoaded('user')),
            'address' => new AddressResource($this->whenLoaded('address')),
        ];
    }
}
