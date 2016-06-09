<?php

namespace Idevelopment\Timecontrol\Api\Transformers;

use App\User;
use League\Fractal;

/**
 * Class StaffTransformer
 *
 * @package Idevelopment\Timecontrol\Api\Transformers
 * @author  Tim Joosten <Topairy@gmail.com>
 * @license https://github.com/tjoosten/timecontrol-api/blob/master/LICENSE GNU
 * @link    https://github.com/tjoosten/timecontrol-api
 */
class StaffTransformer extends Fractal\TransformerAbstract
{
    /**
     * Set the transformer for all the database relations.
     *
     * @var array
     */ 
    protected $defaultIncludes = ['Teams'];

    /**
     * Staff member transformer. 
     *
     * @param  User $user
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id'          => (int)    $user->id,
            'firstname'   => (string) $user->fname,
            'lastname'    => (string) $user->name,
            'address'     => (string) $user->address,
            'postal_code' => (string) $user->postal_code, 
            'city'        => (string) $user->city,
            'country'     => (string) $user->country,
            'phone'       => (string) $user->phone, 
            'timestamps'  => [
                'created_at' => (string) $user->created_at,
                'updated_at' => (string) $user->updated_at
            ], 
        ];
    }

    /**
     * The staff member -> teams relation transformer.
     *
     * @param  User $user
     * @return array
     */
    public function IncludeTeams(User $user)
    {
        $teams = $user->teams;
        return $this->collection($teams, new TeamsTransformer);
    }
}