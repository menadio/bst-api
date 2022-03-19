<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CharacterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'            => $this->id,
            'firstName'     => $this->first_name,
            'lastName'      => $this->last_name,
            'status'        => $this->status->name,
            'stateofOrigin' => $this->state_of_origin,
            'gender'        => $this->gender,
            'location'      => new LocationResource($this->whenLoaded('location')),
            'episodes'      => EpisodeResource::collection($this->whenLoaded('episodes')),
            'created'       => $this->created_at->toDateTimeString()
        ];
    }
}
