<?php

namespace Source;

interface IServiceProduct{

	public function show();
	public function save();
	public function search($id);
	public function update();
	public function delete($id);
}


?>