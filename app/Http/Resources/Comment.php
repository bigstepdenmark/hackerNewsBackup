<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Comment extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray( $request )
    {
        return [ 'id'         => $this->id,
                 'comment'    => $this->comment,
                 'parent_id'  => $this->parent === null ? -1 : $this->parent->id,
                 'story_id'   => $this->story === null ? -1 : $this->story->id,
                 'user'       => $this->user === null ? -1 : $this->user->username,
                 'created_at' => $this->created_at, ];
    }
}
