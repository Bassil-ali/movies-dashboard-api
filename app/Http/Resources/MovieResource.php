<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'poster' => $this->poster_path,
            'banner' => $this->banner_path,
            'type' => $this->type,
            'release_date' => $this->release_date,
            'vote' => $this->vote,
            'vote_count' => $this->vote_count,
            'genres' => GenreResource::collection($this->whenLoaded('genres')),
        ];

    }//end of to array

}//end of resource
