<?php
namespace Se7enChat\Interactors\DependencyContracts;

interface PostDependencyContract
{
	public function getNewDatabase();
	public function getNewPresenter();
}