<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\messageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(messageRequest $request)
    {
        $data = $request->validated();

        $message = new Message();
        $message->create($data);
        return response()->json($data);
    }
}
