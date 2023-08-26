<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class UpdateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateUser',
        'description' => 'A update user mutation'
    ];

    public function type(): Type
    {
        return GraphQL::type('User');
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The ID of the user',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of the user',
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email address of the user',
            ],
            'password' => [
                'type' => Type::string(),
                'description' => 'The password of the user',
            ],
            'phone' => [
                'type' => Type::string(),
                'description' => 'The phone number of the user',
            ],
            'gender' => [
                'type' => Type::string(),
                'description' => 'The gender of the user',
            ],
            'address' => [
                'type' => Type::string(),
                'description' => 'The address of the user',
            ],
            'employee_id' => [
                'type' => Type::string(),
                'description' => 'The employee ID of the user',
            ],
            'is_present' => [
                'type' => Type::boolean(),
                'description' => 'Whether the user is present',
            ],
            'role' => [
                'type' => Type::string(),
                'description' => 'The role of the user',
            ],
            'profile' => [
                'type' => Type::string(),
                'description' => 'The profile information of the user',
            ],

            'updated_at' => [
                'type' => Type::string(),
                'description' => 'The timestamp when the user was last updated',
            ],
        ];
    }


    public function resolve($root, $args)
    {
        $user = User::findOrFail($args['id']);
        $user->fill($args);
        $user->save();

        return $user;
    }
}
