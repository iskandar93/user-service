<?php

namespace App\Services;

class AddressService
{
    public function storeAddress($model, $request)
    {
        return $model->addresses()->updateOrCreate([
            'addressable_id' => $model->id,
        ],[
            'line_1' => $request->line_1,
            'line_2' => $request->line_2,
            'postcode' => $request->postcode,
            'city' => $request->city,
            'state_id' => $request->state_id
        ]);
    }
}
