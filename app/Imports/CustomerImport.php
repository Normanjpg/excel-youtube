<?php

namespace App\Imports;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class CustomerImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $customer = Customer::where('email', $row['email'])->first();
            if ($customer) {
                $customer->update([
                    'name' => $row['name'],
                    'phone' => $row['phone']
                ]);
            } else {
                $customer = new Customer;
            $customer->id = Str::uuid()->toString();
            $customer->name = $row['name'];
            $customer->email = $row['email'];
            $customer->phone = $row['phone'];
            $customer->save();
            }
        }
    }
}
