<?php

namespace App;

interface QueryBuilderInterface
{
    public function select(string ...$fields): static;

    public function from(string $table, string $alias = ''): static;

    public function where(string $condition): static;

    public function orderBy(string $field, string $direction = 'ASC'): static;

    public function limit(int $limit): static;

    public function getSQL(): string;
}