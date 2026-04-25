<?php

namespace App\Services;

use App\Models\Hotel;

class HotelService
{
    public function getAll($filters = [])
    {
        $query = Hotel::query();

        if (!empty($filters['city'])) {
            $query->where('city', $filters['city']);
        }

        if (!empty($filters['rating'])) {
            $query->where('rating', $filters['rating']);
        }

        return $query->paginate(10);
    }

    public function create(array $data)
    {
        return Hotel::create($data);
    }
}
