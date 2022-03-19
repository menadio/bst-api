<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        return Status::all();
    }

    public function store(Request $request)
    {
        $status = Status::create(request(['name', 'description']));

        return $status;
    }
}
