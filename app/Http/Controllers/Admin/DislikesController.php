<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Dislike;
use Illuminate\Http\Request;

class DislikesController extends Controller
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
            $dislikes = Dislike::where('comment_id', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $dislikes = Dislike::paginate($perPage);
        }

        return view('admin.dislikes.index', compact('dislikes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.dislikes.create');
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
        
        Dislike::create($requestData);

        return redirect('admin/dislikes')->with('flash_message', 'Dislike added!');
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
        $dislike = Dislike::findOrFail($id);

        return view('admin.dislikes.show', compact('dislike'));
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
        $dislike = Dislike::findOrFail($id);

        return view('admin.dislikes.edit', compact('dislike'));
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
        
        $dislike = Dislike::findOrFail($id);
        $dislike->update($requestData);

        return redirect('admin/dislikes')->with('flash_message', 'Dislike updated!');
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
        Dislike::destroy($id);

        return redirect('admin/dislikes')->with('flash_message', 'Dislike deleted!');
    }
}
