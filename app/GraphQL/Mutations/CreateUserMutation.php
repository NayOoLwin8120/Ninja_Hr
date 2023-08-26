<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Closure;
use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createUser',
        'description' => 'Create a new user',
    ];

    public function type(): Type
    {
        return GraphQL::type('User');
    }

    public function args(): array
    {
        return [
            // 'id' => [
            //     'type' => Type::nonNull(Type::int()),
            //     'description' => 'The ID of the user',
            // ],
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
                'description' => 'The phone number of the user ',
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

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        // $fields = $getSelectFields();
        // $select = $fields->getSelect();
        // $with = $fields->getRelations();

        // return [];
        $user = new User();
        $user->fill($args); // Fill the user attributes based on the provided args
        $user->save();

        return $user;
    }
}
