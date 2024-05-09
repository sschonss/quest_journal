<?php

namespace App\GraphQL\Queries\User;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'user',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('User'));
    }

    public function args(): array
    {
        return [
            'ids' => [
                'name' => 'ids',
                'type' => Type::listOf(Type::int()),
                'rules' => ['required'],
            ],
            'name' => [
                'name' => 'name',
                'type' => Type::nonNull(Type::string()),
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::nonNull(Type::string()),
            ],

        ];
    }

    public function resolve($root, $args)
    {
        $query = User::query();

        if (isset($args['ids'])) {
            $query->whereIn('id', $args['ids']);
        }

        if (isset($args['name'])) {
            $query->where('name', $args['name']);
        }

        if (isset($args['email'])) {
            $query->where('email', $args['email']);
        }

        return $query->get();
    }






}
