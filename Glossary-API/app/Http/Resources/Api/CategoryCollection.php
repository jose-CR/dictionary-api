<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'info' => [
                'count' => $this->total(),
                'pages' => $this->lastPage(),
                'next' => $this->nextPageUrl(),
                'prev' => $this->previousPageUrl(),
            ],
            'data' => $this->collection,
            'meta' => [
                'current_page' => $this->currentPage(),
                'per_page' => $this->perPage(),
                'to' => $this->lastItem(),
                'last_page' => $this->lastPage(),
                'total' => $this->total()
            ],
            'links' => [
                'first' => $this->url(1),
                'prev' => $this->previousPageUrl(),
                'next' => $this->nextPageUrl(),
                'last' => $this->url($this->lastPage()),
            ]
        ];
    }
}
