<?php

namespace Jbb\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Jbb\Article;
use Jbb\User;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function save(User $user)
    {
        return $user->canDo('ADD_ARTICLES');
    }

    public function edit(User $user)
    {
        return $user->canDo('UPDATE_ARTICLES');
    }

    public function destroy(User $user, Article $article)
    {
        return $user->canDo('DELETE_ARTICLES');
        // return ($user->canDo('DELETE_ARTICLES') && $user->id == $article->user_id); //удалить может только тот кто добавил
    }
}
