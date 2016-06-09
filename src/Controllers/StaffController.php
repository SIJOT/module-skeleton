<?php

namespace Idevelopment\Timecontrol\Api\Controllers;

use App\User;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use Idevelopment\Timecontrol\Api\Transformers\StaffTransformer;
use Illuminate\Http\Request;

/**
 * Class StaffController
 * @package Idevelopment\Timecontrol\Api\Controllers
 */
class StaffController extends ApiGuardController
{
    public function all()
    {

    }

    /**
     * @param  int $id the id of the staff member.
     * @return mixed
     */
    public function specific($id)
    {
        try {
            $relations = ['departmentManager', 'teams'];
            $user = User::with($relations)->findOrfail($id);

            if ($user->count() === 0) {
                return $this->response->withError('No employee found.', '404', 'application/json');
            }

            return $this->response->withCollection($user, new StaffTransformer);
        } catch (ModelNotFoundException $e) {
            return $this->response->errorNotFound();
        }
    }

    public function create()
    {

    }

    /**
     * @param int $id the id of the staff member.
     */
    public function update($id)
    {

    }

    /**
     * @param int $id the id of the staff member.
     */
    public function destroy($id)
    {

    }
}