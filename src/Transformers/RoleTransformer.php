<?php 

namespace Idevelopment\Timecontrol\Api\Transformers;

use App\Role;
use League\Fractal;

/**
 * Class Roletransformer 
 * 
 * @package Idevelopment\Timecontrol\Api\Transformers
 * @author  Tim Joosten <Topairy@gmail.com>
 * @license https://www.github.com/tjoosten/timecontrol-api/blob/master/LICENSE GNU
 * @link    https://www.github.com/tjoosten/timecontrol-api
 */
class RoleTransformer extends Fractal\TransformerAbstract
{
	/**
     * Roles transformer. 
     *
     * @param  Role $role
     * @return array
     */
	public function transform(Role $role)
	{
		return [
			'id'   => (int)    $role->id, 
			'name' => (string) $role->name
		];
	}
}