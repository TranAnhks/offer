<?php

namespace App\Repositories;

abstract class BaseRepository
{
	/**
	 * @var [_model]
	 */
	protected $_model;

	public function __construct()
	{
		$this->setModel();
	}

	abstract public function model();

	public function setModel()
	{
		$this->_model = app()->make(
			$this->model()
		);
	}

	public function all(){
		return $this->_model->all();
	}

	public function with($model)
	{
		return $this->_model->with($model)->get();
	}

	public function getAdminId()
	{
		return \Auth::guard('admin-api')->id();
	}

	public function where($conditions, $value = null)
	{
		return $this->_model->where($conditions, $value)->get();
	}

	public function create(array $attributes = []){
		return $this->_model->create($attributes);
	}

	public function findBySlugOrFail($slug = null){
		return $this->_model->findBySlugOrFail($slug);
	}

	public function findOrFail($id = null){
		$model = $this->_model->findOrFail($id);
		return $model;
	}

	public function update(array $attributes, $model)
	{
		return $model->update($attributes);
	}

	public function checkAuth()
	{
		return \Auth::check();
	}

	public function getAuthId()
	{
		return \Auth::id();
	}

	public function getAuth(){
		return \Auth::user();
	}

}
