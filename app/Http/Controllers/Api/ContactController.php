<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\messageRequest;
use App\Models\Message;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isNull;

class ContactController extends Controller
{
    public function store(messageRequest $request)
    {
        $data = $request->validated();

        if (key_exists('attachment', $data)) {
            $data['attachment'] = Storage::put('/attachment', $data['attachment']);
        }


        $message = new Message();
        $message->create($data);
        return response()->json($data);
    }
}
