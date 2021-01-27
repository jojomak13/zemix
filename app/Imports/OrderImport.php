<?php

namespace App\Imports;

use App\Order;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class OrderImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return Order|null
     */
    public function model(array $row)
    {
        return new Order([
           'client_name' => $row['name'],
           'phone'       => $row['phone'],
           'price'       => $row['price'],
           'city_id'     => $row['city'],
           'address'     => $row['address'],
           'content'     => $row['content'],
           'status_id'   => 1,
           'seller_id'   => auth('seller')->user()->id 
        ]);
    }

    public function rules(): array
    {
        return [
            'name'    => 'required',
            'phone'   => 'required',
            'price'   => 'required',
            'city'    => 'required|exists:cities,id',
            'address' => 'required',
            'content' => 'required' 
        ];
    }
}