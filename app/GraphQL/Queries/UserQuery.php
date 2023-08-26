<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\User;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'user',
        'description' => 'A query to retrieve a list of users',
    ];

    public function type(): Type
    {
        return GraphQL::type('User');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }

    // public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    // {
    //     // $fields = $getSelectFields();
    //     // $users = User::query();

    //     // // Apply filters, sorting, pagination, etc., to the $users query

    //     // $users = $users->get(); // Get the users data

    //     // return [
    //     //     'users' => $users, // Return the data under the "users" field
    //     // ];
    //     return  User::findOrFail($args['id']);
    //     /** @var SelectFields $fields */
    //     // $fields = $getSelectFields();
    //     // $select = $fields->getSelect();
    //     // $with = $fields->getRelations();

    //     // return [
    //     //     'The user works',
    //     // ];
    // }

    public function resolve($root, $args)
    {
        return User::findOrFail($args['id']);
    }
}
