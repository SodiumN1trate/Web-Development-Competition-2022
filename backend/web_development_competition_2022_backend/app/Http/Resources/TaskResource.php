<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TagResource;
use App\Models\Tag;
class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'type'=>$this->type,
            'category'=>$this->category,
            'time'=>$this->time,
            'notes'=>$this->notes,
            'owner_id'=>$this->owner_id,
            'created_at'=>$this->created_at->format('Y-m-d H:i:s'),
            'tags'=>TagResource::collection(Tag::all()->where('task_id', '==', $this->id))
        ];
    }
}
