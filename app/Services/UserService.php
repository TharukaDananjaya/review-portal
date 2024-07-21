<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{
    /**
     * @param array $data
     * @return object
     */
    public function store(array $data): ?Object
    {
        try {
            return User::create($data);
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
            return User::orderBy('id', 'desc')->paginate(10);
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
            return User::where('id', $id)->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * @param int $nid
     * @return bool
     */
    public function deleteByNid($nid): Bool
    {
        try {
            return User::where('nid', $nid)->delete();
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
            return User::where('id', $id)->first();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * @param int $nid
     * @return object
     */
    public function getByNid($nid): ?Object
    {
        try {
            return User::where('nid', $nid)->first();
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
            return User::where('id', $id)->update($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function updateByNid(array $data, $nid): Bool
    {
        try {
            return User::where('nid', $nid)->update($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function getTotalUsers()
    {
        try {
            return User::count();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function getUserCount($status)
    {
        try {
            return User::where('status', $status)->count();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function totalEarnings()
    {
        try {
            return User::select('profit_per_month')->sum('profit_per_month');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
