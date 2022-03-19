<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Episode $episode)
    {
        try {
            $comments = Comment::whereBelongsTo($episode)
                ->orderBy('ip_address_location', 'desc')
                ->orderBy('created_at', 'desc')->get();
            
                return $this->successResponse(
                    CommentResource::collection($comments),
                    'Successfully retrieved collection of comments'
                );

        } catch (\Exception $e) {
            return $this->serverError();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Episode $episode)
    {
        // validate request data
        $validation = Validator::make($request->all(), [
            'comment'   => ['required', 'max: 249']
        ]);

        if ($validation->fails())
            return $this->validationError($validation->errors());

        try {
            $comment = Comment::create([
                'episode_id' => $episode->id,
                'comment'   => $request->comment,
                'ip_address_location'   => $request->getClientIp()
            ]);

            return $this->successResponse(
                new CommentResource($comment),
                'Your comment was added sucessfully.',
                201
            );
        } catch (\Exception $e) {
            return $this->serverError();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
