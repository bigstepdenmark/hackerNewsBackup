<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Story extends Resource
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
        return [ 'title'      => $this->title,
                 'text'       => $this->text,
                 'hanesst_id' => $this->hanesst_id,
                 'url'        => $this->url,
                 'points'     => $this->points,
                 'is_spam'    => $this->is_spam,
                 'type'       => $this->type->title,
                 'user'       => $this->user->username, ];
    }
}