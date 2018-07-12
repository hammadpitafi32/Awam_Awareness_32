<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Like;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $likes = Like::where('comment_id', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $likes = Like::paginate($perPage);
        }

        return view('admin.likes.index', compact('likes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.likes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'comment_id' => 'required',
			'user_id' => 'required'
		]);
        $requestData = $request->all();
        
        Like::create($requestData);

        return redirect('admin/likes')->with('flash_message', 'Like added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $like = Like::findOrFail($id);

        return view('admin.likes.show', compact('like'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $like = Like::findOrFail($id);

        return view('admin.likes.edit', compact('like'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'comment_id' => 'required',
			'user_id' => 'required'
		]);
        $requestData = $request->all();
        
        $like = Like::findOrFail($id);
        $like->update($requestData);

        return redirect('admin/likes')->with('flash_message', 'Like updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Like::destroy($id);

        return redirect('admin/likes')->with('flash_message', 'Like deleted!');
    }
}
