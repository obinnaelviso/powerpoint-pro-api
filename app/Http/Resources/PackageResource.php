<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'min_duration' => $this->min_duration,
            'max_duration' => $this->max_duration,
            'min_slides' => $this->min_slides,
            'max_slides' => $this->max_slides,
            'amount' => $this->amount,
            'amount_string' => $this->amount_string,
            'status' => new StatusResource($this->status),
        ];
    }
}
