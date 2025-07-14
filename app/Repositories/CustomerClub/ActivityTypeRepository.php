<?php

namespace App\Repositories\CustomerClub;

use App\Interfaces\CustomerClub\ActivityTypeRepositoryInterface;
use App\Models\ActivityType;
use Illuminate\Support\Collection;

class ActivityTypeRepository implements ActivityTypeRepositoryInterface
{
    public function find(int $id): ?ActivityType
    {
        return ActivityType::find($id);
    }

    public function allActive(): Collection
    {
        return ActivityType::where('is_active', true)->get();
    }

    public function create(array $data): ActivityType
    {
        return ActivityType::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return ActivityType::where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return ActivityType::destroy($id);
    }

    public function findByKey(string $key): ?ActivityType
    {
        return ActivityType::where('key', $key)->first();
    }

    public function getAllActive()
    {
        return ActivityType::where('is_active', true)->get();
    }

    public function findById(int $id)
    {
        return ActivityType::findOrFail($id);
    }
}
