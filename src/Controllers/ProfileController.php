<?php

namespace Idevelopment\Timecontrol\Api\Controllers;

use Illuminate\Routing\Controller;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use Illuminate\Http\Request;

/**
 * Class ProfileController
 *
 * @package Idevelopment\Timecontrol\Api\Controllers
 * @author  Tim Joosten <Topairy@gmail.com>
 * @license https://github.com/tjoosten/timecontrol-api/blob/master/LICENSE GNU
 * @link    https://github.com/tjoosten/timecontrol-api
 */
class ProfileController extends ApiController
{
	public function __construct()
	{
        parent::__construct();
        
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

    public function getProfile()
    {
    	try {

    	} catch(ModelNotFoundException $e) {

    	}
    }

    public function updateProfile(User $user, request $input)
    {
        try {

        } catch(ModelNotFoundException $e) {

        }
    }
}