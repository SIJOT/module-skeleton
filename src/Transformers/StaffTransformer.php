<?php

namespace Idevelopment\Timecontrol\Api\Transformers;

use App\User;
use League\Fractal;

/**
 * Class StaffTransformer
 */
class StaffTransformer extends Fractal\TransformerAbstract
{
    /**
     * @param  User $user
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
        ];
    }
}