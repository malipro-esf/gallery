<?php

namespace App\Repositories;

use App\Models\Settings;

class SettingsRepository implements SettingsRepositoryInterface
{
    public function getAll()
    {
        return Settings::all();
    }

    public function store($data)
    {
        return Settings::create($data);
    }

    public function update(Settings $settings, $data)
    {
        return $settings->update($data);

    }

    public function delete(Settings $settings)
    {
        $settings->delete();
    }

}
