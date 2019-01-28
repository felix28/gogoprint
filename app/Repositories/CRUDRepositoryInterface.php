<?php

namespace App\Repositories;

interface CRUDRepositoryInterface
{
    public function all();

    public function create(array $data);

    public function show($id);
}
