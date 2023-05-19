<?php

namespace App\Collections;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as BaseCollection;

class BlogCollection extends Collection
{
    /**
     * フォード
     */
    public function feed(): BaseCollection
    {
        return $this->flatMap->posts->sortByDesc('created_at');
    }
}
