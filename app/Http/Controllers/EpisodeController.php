<?php

namespace App\Http\Controllers;

use App\Http\Resources\EpisodeResource;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $episodes = Episode::orderBy('released_on', 'asc')->get();
    
            return $this->successResponse(
                EpisodeResource::collection($episodes), 
                'Successfully retrieved list of episodes'
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
    public function store(Request $request)
    {
        // validate request
        $validation = Validator::make($request->all(), [
            'name'  => ['required', 'string'],
            'code'  => ['required', 'string'],
            'release_date'  => ['required', 'date']
        ]);

        if ($validation->fails()) 
            return $this->validationError($validation->errors());

        try {
            $episode = Episode::create([
                'name'          => $request->name,
                'code'          => $request->code,
                'released_on'   => $request->release_date
            ]);
    
            return $this->successResponse(
                new EpisodeResource($episode),
                'New episode created successfully',
                201
            );
        } catch (\Exception $e) {
            return $this->serverError();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function show(Episode $episode)
    {
        try {
            return $this->successResponse(
                new EpisodeResource($episode->load('characters', 'comments')),
                'Successfully retrieved episode'
            );
        } catch (\Exception $e) {
            return $this->serverError();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Episode $episode)
    {
        // validate request
        $validation = Validator::make($request->all(), [
            'name'  => ['string'],
            'code'  => ['string'],
            'release_date'  => ['date']
        ]);

        if ($validation->fails()) 
            return $this->validationError($validation->errors());

        try {
            $episode->update($request->all());

            return $this->successResponse(
                new EpisodeResource($episode),
                'Updated episode successfully.'
            );
        } catch (\Exception $e) {
            return $this->serverError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Episode $episode)
    {
        try {
            $episode->delete();
    
            return $this->successResponse(null, 'Episode removed successfully');
        } catch (\Exception $e) {
            return $this->serverError();
        }
    }
}
