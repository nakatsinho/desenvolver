<?php

namespace APDS\Http\Controllers;

use APDS\Models\Chat;
use APDS\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $users = User::where('role_id',2)->get();

        if (Auth::check())
        {
            $statuses = Chat::notReply()->where(function($query) {
                return $query->where('user_id', Auth::user()->id)
                    ->orWhereIn('user_id', Auth::user()->friends()->pluck('id')
                );
            })
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        }

        return view ('chat.index',compact('users','statuses'));
    }
    public function show($id)
    {
        if (Auth::check())
        {
            $statuses = Chat::notReply()->where(function($query) {
                return $query->where('user_id', Auth::user()->id)
                    ->orWhereIn('user_id', Auth::user()->friends()->pluck('id')
                );
            })
            ->orderBy('created_at', 'desc')
            ->paginate(6);

            return view('chat.show')
                ->with('statuses', $statuses);
        }
        $users = User::all();
        return view('chat.index', compact('users'));
        
    }
    public function create()
    {
        
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'status' => 'required|max:1000',
        ]);

        Auth::user()->statuses()->create([
            'body' => $request->input('status'),
        ]);

        return redirect()
            ->back()
            ->with('info','Post enviado com sucesso!');
    }
    public function update()
    {
        
    }
    public function destroy()
    {
        
    }

    public function postReply(Request $request, $statusId)
    {
        $this->validate($request, [
            "reply-{$statusId}" => 'required|max:1000',
        ], [
            'required' => 'Preencha o campo de resposta primeiro.'
        ]);

        $status = Chat::notReply()->find($statusId);

        if (!$status)
        {
            return redirect()->route('home');
        }

        if (!Auth::user()->isfriendsWith($status->user) && Auth::user()->id !== $status->user->id)
        {
            return redirect()->route('home');
        }

        $reply = Chat::create([
            'body' => $request->input("reply-{$statusId}"),
        ])->user()->associate(Auth::user());

        $status->replies()->save($reply); 

        return redirect()->back();
    }

    public function getLike($statusId)
    {
        $status = Chat::find($statusId);

        if (!$status)
        {
            return redirect()->route('home');
        }

        if (!Auth::user()->isfriendsWith($status->user))
        {
            return redirect()->route('chat.index');
        }

        if(Auth::user()->hasLikedStatus($status))
        {
            return redirect()->back();
        }

        $like = $status->likes()->create([]);
        Auth::user()->likes()->save($like);

        return redirect()->back();
    }
}
