<?php

namespace App\Services;

class ShippingMethodService
{
    /**
     * @param object $request
     * @param string $addedBy
     * @return array
     */
    public function addShippingMethodData(object $request, string $addedBy): array
    {

        return [
            'creator_id' => $addedBy == 'seller' ? auth('seller')->id() : auth('admin')->id(),
            'creator_type' => $addedBy,
            'title' => $request['title'],
            'duration' => $request['duration'],
            'cost' => currencyConverter($request['cost']),
            'cost_per_products' => currencyConverter($request['cost_per_products']),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
