<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class MessageController for Rest Api.
 */
class MessageController extends Controller
{
    /**
     * @return JsonResponse
     */
	public function getCollection(): JsonResponse
	{
	    $collection = Message::latestByRoom()->get();

        return response()->json($collection);
	}

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $item = new Message();
        $item->content = $request->request->get('content');
        $item->user_id = $request->request->get('user_id');
        $item->room_id = $request->request->get('room_id');
        $item->save();

        return response()->json($item, 201);
    }
}