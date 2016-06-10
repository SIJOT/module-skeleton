<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class ApiRoleControllerTest
 *
 * @package 
 * @author 
 * @license 
 * @link
 */
class ApiRoleControllerTest extends TestCase
{
	// DatabaseMigrations   = Used for the database migrations.
	// DatabaseTransactions = Used for the database transactions. 
	use DatabaseMigrations, DatabaseTransactions;

	/**
	 * GET: {route prefix}/roles
	 *
	 * @group all 
	 * @group api
	 */
    public function testRouteAllWithRecodrds()
    {
        $route = config('Timecontrol-api.route_prefix') . '';

        $headers['X-Authorization'] = '';

        $this->get($route, $headers);
        $this->seestatusCode(200);
    }

    /** 
     * GET: {route prefix}/roles
     *
     * @group all 
     * @group api
     */ 
    public function testRouteAllWithoutRecords()
    {
    	$route = config('Timecontrol-api.route_prefix') . '';

    	$headers['X-Authorization'] = '';

        $this->get($route, $headers);
        $this->seestatusCode(200)
    }

    /**
     * POST: {route prefix}/roles/create
     *
     * @group all 
     * @group api
     */
    public function testRouteCreateWithErrors()
    {
        $route = config('Timecontrol-api.route_prefix') . '';

        $input['name']              = 'test role';
        $headers['X-Authorization'] = ''; 
        
        $this->post($route, $input, $headers); 
        $this->seestatusCode(200);
    }

    /**
     * POST: {route prefix}/roles/create
     *
     * @group all 
     * @group api
     */ 
    public function testRouteCreateWithoutErrors()
    {

    }

    /**
     * GET: {route prefix}/roles/specific/{id}
     *
     * @group all 
     * @group api
     */
    public function testRouteSpecificWithData()
    {
        $role  = factory(App\Role::class)->create();
    	$route = config('Timecontrol-api.route_prefix') . '' . $role->id;

    	$headers[''] = '';

    }

    /**
     * GET: {route prefix}/roles/specific/{id}
     *
     * @group all 
     * @group api
     */
    public function testRouteSpecificWithoutData()
    {
        $role  = factory(App\Role::class)->create();
    	$route = config('Timecontrol-api.route_prefix') . '' . $role->id;

    	$headers['X-Authorization'] = '';
    }

    /**
     * DELETE: {route prefix}/roles/destroy/{id}
     *
     * @group all 
     * @group api
     */
    public function testRouteDeleteWithValidId()
    {
    	$user  = factory(App\User::class)->create();
        $role  = factory(App\Role::class)->create();
    	$route = config('') . '' . $role->id;
        
    	$headers['X-Authorization'] = '';

        $this->delete($route, $headers);
        $this->seeStatucCode(200);
    }
}