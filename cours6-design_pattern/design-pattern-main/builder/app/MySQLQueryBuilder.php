<?php

namespace App;

class MySQLQueryBuilder implements QueryBuilderInterface
{
    private array $select = [];
    private string $from = '';
    private string $alias = '';
    private array $wheres = [];
    private array $orderBys = [];
    private ?int $limit = null;

    public function select(string ...$fields): static
    {
        $this->select = $fields;
        return $this;
    }

    public function from(string $table, string $alias = ''): static
    {
        $this->from = $table;
        $this->alias = $alias;
        return $this;
    }

    public function where(string $condition): static
    {
        $this->wheres[] = $condition;
        return $this;
    }

    public function orderBy(string $field, string $direction = 'ASC'): static
    {
        $this->orderBys[] = "$field $direction";
        return $this;
    }

    public function limit(int $limit): static
    {
        $this->limit = $limit;
        return $this;
    }

    public function getSQL(): string
    {
        $select = $this->select ? implode(', ', $this->select) : '*';
        $from = $this->alias ? "{$this->from} {$this->alias}" : $this->from;
        $sql = "SELECT {$select} FROM {$from}";

        if ($this->wheres) {
            $sql .= ' WHERE ' . implode(' AND ', $this->wheres);
        }
        if ($this->orderBys) {
            $sql .= ' ORDER BY ' . implode(', ', $this->orderBys);
        }
        if ($this->limit !== null) {
            $sql .= " LIMIT {$this->limit}";
        }

        return $sql;
    }
}
