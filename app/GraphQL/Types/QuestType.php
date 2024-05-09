<?php

namespace App\GraphQL\Types;

use App\Models\Quest;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Safe\Exceptions\DatetimeException;

class QuestType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Quest',
        'description' => 'Collection of quests with their respective category',
        'model' => Quest::class
    ];

    /**
     * @throws DatetimeException
     */
    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of quest'
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Title of the quest'
            ],
            'description' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Description of quest'
            ],
            'reward' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Quest reward'
            ],
            'category' => [
                'type' => GraphQL::type('Category'),
                'description' => 'The category of the quest'
            ],
            'created_at' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Date when quest was created'
            ],
            'expires_at' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Date when quest expires'
            ],
            'last_access' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Date when quest was last accessed'
            ],
            'user_reward' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'User who completed the quest'
            ]
        ];
    }
}
