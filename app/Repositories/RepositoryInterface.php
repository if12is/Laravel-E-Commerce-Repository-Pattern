<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function baseQuery($relation = []);

    public function getById($id);

    public function store($validated);

    public function update($id, $validated);

    public function delete($validated);
}
