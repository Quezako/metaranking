<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mood;
use App\Http\Requests\Mood\Index;
use App\Http\Requests\Mood\Show;
use App\Http\Requests\Mood\Create;
use App\Http\Requests\Mood\Store;
use App\Http\Requests\Mood\Edit;
use App\Http\Requests\Mood\Update;
use App\Http\Requests\Mood\Destroy;


/**
 * Description of MoodController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class MoodController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.mood.index', ['records' => Mood::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  Mood  $mood
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, Mood $mood)
    {
        return view('pages.mood.show', [
                'record' =>$mood,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {

        return view('pages.mood.create', [
            'model' => new Mood,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new Mood;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Mood saved successfully');
            return redirect()->route('mood.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Mood');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  Mood  $mood
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, Mood $mood)
    {

        return view('pages.mood.edit', [
            'model' => $mood,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  Mood  $mood
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,Mood $mood)
    {
        $mood->fill($request->all());

        if ($mood->save()) {
            
            session()->flash('app_message', 'Mood successfully updated');
            return redirect()->route('mood.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Mood');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  Mood  $mood
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, Mood $mood)
    {
        if ($mood->delete()) {
                session()->flash('app_message', 'Mood successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Mood');
            }

        return redirect()->back();
    }
}
