<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthUserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'token_type' => 'Bearer',
            'token' => $this->token,
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
