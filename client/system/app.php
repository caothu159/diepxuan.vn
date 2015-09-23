<?php

/* * ********************************************
 * param app to save all param of app			*
 * ******************************************** */

class Dapp {

	public $database;

	public function __construct() {

	}

	public function __call($method, $args) {
		if (isset($this->{$method}) && is_callable($this->{$method})) {
			return call_user_func_array($this->{$method}, $args);
		} else {
			throw new Exception("Fatal error: Call to undefined method stdObject::{$method}()");
		}
	}

}

$app = new Dapp;
