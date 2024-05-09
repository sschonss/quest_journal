<?php

namespace App\GraphQL\Types;

use App\Models\Category;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CategoryType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Category',
        'description' => 'Collection of categories',
        'model' => Category::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the category'
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The title of the category'
            ],
            'quests' => [
                'type' => Type::listOf(GraphQL::type('Quest')),
                'description' => 'The quests of the category'
            ],
            'hash' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The hash of the category'
            ],
            'created_at' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Date when category was created'
            ],
            'updated_at' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Date when category was updated'
            ],
            'user_created' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'User who created the category'
            ],
            'journal_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Journal name of the category'
            ]
        ];
    }
}
