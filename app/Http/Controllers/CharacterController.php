<?php

namespace App\Http\Controllers;

use App\Http\Resources\CharacterResource;
use App\Http\Resources\EpisodeResource;
use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $query = Character::with('location');

            if ($request->sort &&  $request->order) {
                $query->orderBy($request->sort, $request->order);
            }

            if ($request->sort && !$request->order) {
                $query->orderBy($request->sort);
            }

            if ($request->filter) {
                
                $filter = strtolower($request->filter);

                $query->where(function ($q) use ($filter) {
                    $q->orWhere('gender', $filter)
                    ->orWhereHas('status', function ($q) use ($filter) {
                        $q->where('name', $filter);
                    })
                    ->orWhereHas('location', function ($q) use ($filter) {
                        $q->where('name', $filter);
                    });
                });
            }

            return $this->successResponse(
                CharacterResource::collection($query->get()),
                'Successfully retrieved characters collection'
            );
        } catch (\Exception $e) {
            return $this->serverError();
        }
    }

    /**
     * Get collect of episodes character was featured in.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function episodes(Character $character)
    {
        return $this->successResponse(
            EpisodeResource::collection($character->episodes),
            'Successfully retrieved character episodes.'
        );
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
