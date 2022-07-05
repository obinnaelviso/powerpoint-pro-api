<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RequestFormResource extends JsonResource
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
            'name' => $this->name,
            'category' => $this->category,
            'sub_category' => $this->sub_category,
            'topic' => $this->topic,
            'description' => $this->description,
            'duration' => $this->duration,
            'slides' => $this->slides,
            'phone' => $this->phone,
            'email' => $this->email,
            'location' => $this->location,
            'need' => $this->need,
            'amount' => $this->amount,
            'amount_string' => $this->amount_string,
            'receipt_url' => $this->url,
            'created_at' => $this->created_at->toDateTimeString(),
            'status' => new StatusResource($this->status),
            'user' => new UserResource($this->user),
        ];
    }
}
