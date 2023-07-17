<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlaceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'average_check' => $this->whenNotNull($this->average_check),
            'description' => $this->whenLoaded($this->description),
            'genres' => GenresGroupResource::collection($this->whenLoaded('genreGroups')),
            'rated_users' => UserResource::collection($this->whenLoaded('users')),
            'rates' => $this->whenPivotLoaded('places_users', function () {
                return [
                    'music' => $this->pivot->music,
                    'vibe' => $this->pivot->vibe,
                    'drinks' => $this->pivot->drinks,
                    'cleanness' => $this->pivot->cleanness,
                    'price' => $this->pivot->price,
                ];
            })
        ];
    }
}
