<?php
namespace PHPAuth\DAO;

interface IDAO {
	public function save($obj);
	public function all();
	public function find($id);
	public function find_by($key_value);
	public function update($obj);
	public function delete($id);
}