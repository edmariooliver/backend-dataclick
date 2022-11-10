<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    public function findById($id);
    public function findAll();
    public function destroy(int $id);
    public function update(int $id, array $array);
    public function create(array $array);
}