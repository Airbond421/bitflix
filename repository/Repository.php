<?php

namespace bitflix\repository;
abstract class Repository
{
	abstract function getList(array $filter = []): array;
	abstract function add(array $filter = []): bool;
}