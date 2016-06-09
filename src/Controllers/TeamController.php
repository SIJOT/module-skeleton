<?php 

namespace Idevelopment\TimeControl\Api\Controllers;

use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use Idevelopment\Timecontrol\Api\Transformers\StaffTransformer;
use Illuminate\Http\Request;

/**
 * Class TeamController 
 * 
 * @package Idevelopment\Timecontrol\Api\Controllers
 * @author  Tim Joosten <Topairy@gmail.com>
 * @license https://github.com/tjoosten/timecontrol-api/blob/master/LICENSE GNU
 * @link    https://github.com/tjoosten/timecontrol-api
 */
class TeamController extends ApiGuardController
{
	// TODO: Implement PHPUnit 
	// TODO: Write out teh documentation.
	// TODO: V1.1.0 Implement notifications on the destroy, create, update method.

	/**
	 * Database relations. 
	 * @var array
	 */
	protected $relations;

	/**
     * Validation rules.
     * @var array
     */
    protected $validation;

	/**
	 * teamController constructor. 
	 */ 
	public function __constrcut()
	{
		parent::__constrcut();

		// Validation arrays.
		$this->validation['name']        = 'required';
		$this->validation['manager']     = 'required';
		$this->validation['description'] = 'required';
	}

	/**
	 * Get all the teams. 
	 *
	 * @return Mixed
	 */
	public function all()
	{
		try {

		} catch(ModelNotFoundException $e) {
			return $this->response->errorNotFound();
		}
	}

	/**
	 * Create a new team. 
	 */
	public function create()
	{

	}

	/**
	 * Update a specific team. 
	 */ 
	public function update()
	{
		
	}

	/**
	 * Destroy a team. 
	 */
	public function destroy()
	{

	}
}