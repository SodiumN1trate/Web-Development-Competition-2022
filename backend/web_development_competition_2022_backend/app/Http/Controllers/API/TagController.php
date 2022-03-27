<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Resources\TagResource;
use App\Http\Requests\TagRequest;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TagResource::collection(Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $new_tag = Tag::create($request->validated());
        return new TagResource($new_tag);
    }

    /**
     * Display the specified resource.
     *
     * @param TagRequest $tag
     * @return \Illuminate\Http\Response
     */
    public function show(TagRequest $tag)
    {
        return new TagResource($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());
        return new TagResource($tag);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->destroy();
        return new TaskResource($tag);
    }
}
