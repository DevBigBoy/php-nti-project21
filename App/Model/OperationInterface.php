<?php

interface OperationInterface
{
    public function insert(string $table, array $data): array;
    public function read(string $table, int $id = null): array;
    public function update(string $table, int $id, array $data): array;
    public function delete(string $table, int $id): bool;
}