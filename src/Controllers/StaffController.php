<?php

namespace Idevelopment\Timecontrol\Api\Controllers;

use App\User;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use Idevelopment\Timecontrol\Api\Transformers\StaffTransformer;
use Illuminate\Http\Request;

/**
 * Class StaffController
 *
 * @package Idevelopment\Timecontrol\Api\Controllers
 * @author  Tim Joosten <Topairy@gmail.com>
 * @license https://github.com/tjoosten/timecontrol-api/blob/master/LICENSE GNU
 * @link    https://github.com/tjoosten/timecontrol-api
 */
class StaffController extends ApiGuardController
{
    // TODO: Finish the employee transformer.
    // TODO: Add phpunit tests.

    /**
     * Employee relations. 
     * @var array
     */
    protected $relations; 

    /**
     * Validation rules.
     * @var array
     */
    protected $validation;

    /**
     * StaffController constructor.
     */
    public function __construct(Validator $validator)
    {
        parent::__construct();
        $this->relations  = ['departmentManager', 'teams'];

        // Validation rules for the controller.
        $this->validation['fname']        = 'required';
        $this->validation['name']         = 'required';
        $this->validation['address']      = 'required';
        $this->validation['email']        = 'required|email';
        $this->validation['city']         = 'required';
        $this->validation['country']      = 'required';
        $this->validation['office_phone'] = 'required';
        $this->validation['home_phone']   = 'required';
        $this->validation['mobile_phone'] = 'required';
    }

    /**
     * Display all the employee.
     *
     * @return mixed
     */
    public function all()
    {
        try {
            $employees = User::with($this->relations)->paginate(15);
            return $this->response->withPaginator($employees, new StaffTransformer);
        } catch(ModelNotFoundException $e) {
            return $this->response->errorNotFound();
        }
    }

    /** 
     * Show a apecific employee.
     *
     * @param  int $id the id of the staff member.
     * @return mixed
     */
    public function specific($id)
    {
        try {
            $user = User::with($this->relations)->findOrfail($id);

            if (count($user) === 0) {
                return $this->response->errorNotFound('No employee with this id found');
            }

            return $this->response->withItem($user, new StaffTransformer);
        } catch (ModelNotFoundException $e) {
            return $this->response->errorNotFound();
        }
    }

    /**
     * Create a ew employee.
     *
     * @param  Request $input
     * @return mixed
     */
    public function create(Request $input)
    {
        try {
           $validator = Validator::make($input->all(), $this->validation);
        
            if ($validator->fails()) {
                return $this->response->errorWrongArgs($validator->messages());
            }

            // TODO: Save employee. 
            // TODO: Mail the  user his info. 
            // TODO: Notify the platform administrator.
        } catch(ModelNotFoundException $e) {
            return $this->response->errorNotFound();
        }
    }

    /**
     * Update a employee.
     *
     * @param  Request  $request  The input values.
     * @param  App\user $user     The employee database model.  
     * @param  Int      $id       The id of the staff member.
     * @return Mixed
     */
    public function update(Request $input, User $user, $id)
    {
        try {
            $validator = Validator::make($input->all(), $this->validation);

            if ($validator->fails()) {
                return $this->response->errorWrongArgs($validator->messages());
            }

            $user->find($id);
            $user->update($input->except('_token'));
        } catch(ModelNotFoundException $e) {
            return $this->response->errorNotFound();
        }
    }

    /**
     * Destroy a employee out off timecontrol. 
     *
     * @param  User $user User database model instance.
     * @param  int  $id   The id of the staff member.
     * @return mixex
     */
    public function destroy(User $user, $id)
    {
        try {
            $user->find($id);
            $user->teams()->sync([]);
        } catch(ModelNotFoundException $e) {

        }
    }
}