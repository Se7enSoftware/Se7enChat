<?php
namespace Se7enChat\Libraries\Web\DependencyBuilders;
use Se7enChat\Interactors\DependencyContracts\RoomDependencyContract;
use Se7enChat\Libraries\Database\SQLite\RoomData;

class RoomDependencyBuilder implements RoomDependencyContract
{
	public function getNewDatabase()
	{
		return new RoomData;
	}
}