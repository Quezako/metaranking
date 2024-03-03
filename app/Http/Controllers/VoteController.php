<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vote;
use App\Models\Tag;
use App\Models\Mood;
use App\Models\User;
use App\Http\Requests\Vote\Index;
use App\Http\Requests\Vote\Show;
use App\Http\Requests\Vote\Create;
use App\Http\Requests\Vote\Store;
use App\Http\Requests\Vote\Edit;
use App\Http\Requests\Vote\Update;
use App\Http\Requests\Vote\Destroy;


/**
 * Description of VoteController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function home(Index $request)
    {
        return view('pages.home', [
            'votes' => Vote::paginate(10),
            'tags' => Tag::paginate(10),
            'moods' => Mood::paginate(10)
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.vote.index', ['records' => Vote::paginate(10)]);
    }
    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, Vote $vote)
    {
        return view('pages.vote.show', [
            'record' => $vote,
        ]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {
        $tag = Tag::all();
        $mood = Mood::all(['id', 'label']);
        $users = User::all(['id', 'name']);

        return view('pages.vote.create', [
            'model' => new Vote,
            "tag" => $tag,
            "mood" => $mood,
            "users" => $users,

        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model = new Vote;
        $model->fill($request->all());

        $voteWeight = Vote::where('user_id', auth()->id())->max('weight');
        $model->weight = $voteWeight + 1;
        $model->user_id = auth()->id();

        if ($model->save()) {
            session()->flash('app_message', 'Vote saved successfully');
            return redirect()->route('vote.index');
        } else {
            session()->flash('app_message', 'Something is wrong while saving Vote');
        }
        return redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, Vote $vote)
    {
        $tag = Tag::all();
        $mood = Mood::all(['id', 'label']);
        $users = User::all(['id', 'name']);

        return view('pages.vote.edit', [
            'model' => $vote,
            "tag" => $tag,
            "mood" => $mood,
            "users" => $users,

        ]);
    }
    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, Vote $vote)
    {
        $vote->fill($request->all());

        if ($vote->save()) {

            session()->flash('app_message', 'Vote successfully updated');
            return redirect()->route('vote.index');
        } else {
            session()->flash('app_error', 'Something is wrong while updating Vote');
        }
        return redirect()->back();
    }
    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  Vote  $vote
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, Vote $vote)
    {
        if ($vote->delete()) {
            session()->flash('app_message', 'Vote successfully deleted');
        } else {
            session()->flash('app_error', 'Error occurred while deleting Vote');
        }

        return redirect()->back();
    }
}
