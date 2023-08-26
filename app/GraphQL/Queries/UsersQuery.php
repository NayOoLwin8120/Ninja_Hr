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

class UsersQuery extends Query
{
    protected $attributes = [
        'name' => 'users',
        'description' => 'A query to retrieve a list of users'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('User'));
        // return GraphQL::type('User');
    }

    public function args(): array
    {
        return [];
    }

    // public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    // {
    //     /** @var SelectFields $fields */
    //     $fields = $getSelectFields();
    //     $select = $fields->getSelect();
    //     $with = $fields->getRelations();

    //     return [
    //         'The users works',
    //     ];
    // }
    public function resolve($root, $args)
    {
        return User::all();
    }
    // public function resolve(
    //     $root,
    //     $args,
    //     $context,
    //     ResolveInfo $resolveInfo,
    //     Closure $getSelectFields
    // ) {
    //     $fields = $getSelectFields();
    //     $users = User::query();

    //     // Apply filters, sorting, pagination, etc., to the $users query

    //     return $users->get(); // Get the users data
    // }
}
