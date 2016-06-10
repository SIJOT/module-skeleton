<?php 

namespace Idevelopment\Timecontrol\Api\Transformers;

use App\Departments; 
use League\Fractal;

/**
 * @package Idevelopment\Timecontrol\Api\Transformers
 * @author  Tim Joosten <Topairy@gmail.com>
 * @license https://github.com/tjoosten/timecontrol-api/blob/master/LICENSE GNU
 * @link    https://github.com/tjoosten/timecontrol-api
 */
class DepartmentsTransformer extends Fractal\TransformerAbstract
{
	/**
     * Set the transformer for all the database relations.
     *
     * @var array
     */ 
    protected $defaultIncludes = ['Teams', 'Managers', 'Members'];

	/**
     * Departments transformer. 
     *
     * @param  Departments $department
     * @return array
     */
	public function transform(Departments $department)
	{
		return [
			'id'          => (int)    $department->id;
			'name'        => (string) $department->department_name,
			'description' => (string) $department->department_description
		];
	}

	/**
     * The staff department -> managers relation transformer.
     *
     * @param  Departments $department
     * @return array
     */
	public function IncludeManagers(Departments $department)
	{
		$managers = $department->managers;
		return $this->collection($managers, new StaffTransformer);
	}

	/**
     * The department -> teams relation transformer.
     *
     * @param  Departments $department
     * @return array
     */
	public function IncludeTeams(Departments $department)
	{
		$teams = $department->teams; 
		return $this->collection($teams, new TeamsTransformer);
	}

	/**
     * The department -> members relation transformer.
     *
     * @param  Departments $department
     * @return array
     */
	public function IncludeMembers(Departments $department)
	{
		$members = $department->members;
		return $this->collection($member, new StaffTransformer);
	}
}