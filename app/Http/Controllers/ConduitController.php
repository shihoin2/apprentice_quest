<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conduit;
use App\Models\PostForm;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ConduitController extends Controller
{
    public function index()
    {

        // $conduits = Conduit::Join('users', 'users.id', '=', 'conduits.user_id')
        //     ->select('conduits.id', 'title', 'about', 'detail', 'tag', 'conduits.created_at', 'users.name')
        //     ->get();
        $conduits = Conduit::Join('users', 'users.id', '=', 'conduits.user_id')
            ->select('conduits.id', 'title', 'about', 'detail', 'tag', 'conduits.created_at', 'users.name')
            ->paginate(5);
        // dd($conduits);

        return view('conduit.home', compact('conduits'));
    }

    public function article($id)
    {
        $conduit = Conduit::Join('users', 'users.id', '=', 'conduits.user_id')
        ->select('conduits.id', 'title', 'about', 'detail', 'tag', 'conduits.created_at', 'users.name')
        ->find($id);

        $comments = PostForm::Join('users', 'users.id', '=', 'post_forms.user_id')
        ->Join('conduits', 'conduits.id', '=', 'post_forms.article_id')
        ->select('post_forms.id', 'comment', 'post_forms.created_at', 'users.name','article_id')
        ->where('article_id', '=', $id)
        ->get();

        return view('conduit.article', compact('conduit','comments'));
    }

    public function editor()
    {
        return view('conduit.editor');
    }
    public function editor_id($id)
    {
        $conduit = Conduit::Join('users', 'users.id', '=', 'conduits.user_id')
        ->select('conduits.id', 'title', 'about', 'detail', 'tag', 'conduits.created_at', 'users.name')
        ->find($id);
        return view('conduit.editor2', compact('conduit'));
    }
    public function update(Request $request, $id)
    {
        $conduit = Conduit::find($id);
        $conduit->title=$request->title;
        $conduit->about=$request->about;
        $conduit->detail=$request->detail;
        $conduit->tag=$request->tag;
        $conduit->save();
        return to_route('conduit.index');
    }

    public function destroy($id)
    {
        $conduit = Conduit::find($id);
        $conduit->delete();
        // dd($conduit);
        return to_route('conduit.index');
    }

    public function settings()
    {
        return view('conduit.settings');
    }

    public function profile()
    {
        return view('conduit.profile');
    }

    public function store(Request $request)
    {
        // dd($request, $request->title);
        Conduit::create([
            'title' => $request->title,
            'about' => $request->about,
            'detail' => $request->detail,
            'tag' => $request->tag,
            'user_id' => $request->user_id,

        ]);
        return to_route('conduit.index');
    }

    public function comment(Request $request, $id)
    {
        PostForm::create([
            'comment' => $request->comment,
            'user_id' => $request->user_id,
            'article_id' => $id
        ]);
        return to_route('conduit.index');
    }
}
