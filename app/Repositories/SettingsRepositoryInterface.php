<?php

namespace App\Repositories;

use App\Models\Settings;

interface SettingsRepositoryInterface
{
    public function getAll();

    public function store($data);

    public function update(Settings $settings, $data);

    public function delete(Settings $settings);
}
