<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'api_token' => $this->api_token,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'fname' => $this->fname,
            'lname' => $this->lname,
            'factory' => $this->factory,
            'province' => $this->province,
            'city' => $this->city,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'phone' => $this->phone,
            'pre_phone' => $this->pre_phone,
            'country' => $this->country,
        ];
    }
}
