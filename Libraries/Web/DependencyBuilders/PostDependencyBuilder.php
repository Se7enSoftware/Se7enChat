<?php
namespace Se7enChat\Libraries\Web\DependencyBuilders;
use Se7enChat\Interactors\DependencyContracts\PostDependencyContract;
use Se7enChat\Libraries\Database\SQLite\PostData;
use Se7enChat\Libraries\Web\Presenters\PostPresenter;

class PostDependencyBuilder implements PostDependencyContract
{
	public function getNewDatabase()
	{
		return new PostData;
	}

	public function getNewPresenter()
	{
		return new PostPresenter;
	}
}