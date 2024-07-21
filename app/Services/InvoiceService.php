<?php

namespace App\Services;

use App\Models\Invoice;

class InvoiceService
{
    /**
     * @param array $data
     * @return object
     */
    public function store(array $data): ?Object
    {
        try {
            return Invoice::create($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * @return object
     */
    public function getAll(): ?Object
    {
        try {
            return Invoice::orderBy('id', 'desc')->paginate(10);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * @param int $id
     * @return bool
     */
    public function delete($id): Bool
    {
        try {
            return Invoice::where('id', $id)->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * @param int $id
     * @return object
     */
    public function getById($id): ?Object
    {
        try {
            return Invoice::where('id', $id)->first();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function update(array $data, $id): Bool
    {
        try {
            return Invoice::where('id', $id)->update($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function totalEarnings()
    {
        try {
            return Invoice::select('profit_per_month')->sum('profit_per_month');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function search($customer_name)
    {
        try {
            return Invoice::where('customer_name', 'like', '%' . $customer_name . '%')->orderBy('id', 'desc')->paginate(15);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
