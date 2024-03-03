<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Http\Requests\Tag\Index;
use App\Http\Requests\Tag\Show;
use App\Http\Requests\Tag\Create;
use App\Http\Requests\Tag\Store;
use App\Http\Requests\Tag\Edit;
use App\Http\Requests\Tag\Update;
use App\Http\Requests\Tag\Destroy;

/**
 * Description of TagController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.tag.index', ['records' => tag::paginate(10)]);
    }
    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, tag $tag)
    {
        return view('pages.tag.show', [
            'record' =>$tag,
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
		$tag = Tag::all(['id', 'label']);

        return view('pages.tag.create', [
            'model' => new tag,
			"tag" => $tag,
			// "tag" => $tag,
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
        $model=new tag;
        $model->fill($request->all());

        if ($model->save()) {

            session()->flash('app_message', 'tag saved successfully');
            return redirect()->route('tag.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving tag');
            }
        return redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, tag $tag)
    {
		$tag1 = Tag::all(['id', 'label']);
		// $tag2 = Tag::all(['id', 'label']);

        return view('pages.tag.edit', [
            'model' => $tag,
			"tag" => $tag1,
			// "tag2" => $tag2,
        ]);
    }
    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,tag $tag)
    {
        $tag->fill($request->all());

        if ($tag->save()) {

            session()->flash('app_message', 'tag successfully updated');
            return redirect()->route('tag.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating tag');
            }
        return redirect()->back();
    }
    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  tag  $tag
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, tag $tag)
    {
        if ($tag->delete()) {
                session()->flash('app_message', 'tag successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting tag');
            }

        return redirect()->back();
    }
}
