<?php

namespace App\Repositories;

interface RepositoryInterface
{
	public function all();

	public function with($model);

	public function getAdminId();

	public function where($conditions, $value = null);
	
	public function create(array $attributes = []);

	public function findBySlugOrFail($slug = null);

	public function findOrFail($id = null);

	public function update(array $attributes, $model);

	public function checkAuth();

	public function getAuthId();

	public function getAuth();
}
