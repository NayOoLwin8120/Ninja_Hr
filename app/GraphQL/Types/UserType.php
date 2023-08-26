<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{

    protected $attributes = [
        'name' => 'User',
        'description' => 'Collection of User',
        'model' => User::class,

    ];

    public function fields(): array
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
                'description' => 'The role of the user you can fill hr or employee',
            ],
            'profile' => [
                'type' => Type::string(),
                'description' => 'The profile information of the user',
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'The timestamp when the user was created',
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'The timestamp when the user was last updated',
            ],
        ];
    }
}
