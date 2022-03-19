<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EpisodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'releaseDate'       => $this->released_on,
            'episodeCode'       => $this->code,
            'characters'        => CharacterResource::collection($this->whenLoaded('characters')),
            'noOfComments'      => $this->comments()->count(),
            'episodeComments'   => CommentResource::collection($this->whenLoaded('comments')),
            'created'           => $this->created_at->toDateTimeString()
        ];
    }
}
