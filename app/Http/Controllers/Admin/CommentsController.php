<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Comment;
use App\Like;
use App\Dislike;
use Illuminate\Http\Request;

class CommentsController extends Controller
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
            $comments = Comment::where('id', 'LIKE', "%$keyword%")
            ->orWhere('comment', 'LIKE', "%$keyword%")
            ->orWhere('post_id', 'LIKE', "%$keyword%")
            ->paginate($perPage);
        } else {
            $comments = Comment::paginate($perPage);
        }

        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.comments.create');
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
           'id' => 'required',
           'comment' => 'required',
           'post_id' => 'required'
       ]);
        $requestData = $request->all();
        
        Comment::create($requestData);

        return redirect('admin/comments')->with('flash_message', 'Comment added!');
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
        $comment = Comment::findOrFail($id);

        return view('admin.comments.show', compact('comment'));
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
        $comment = Comment::findOrFail($id);

        return view('admin.comments.edit', compact('comment'));
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
           'id' => 'required',
           'comment' => 'required',
           'post_id' => 'required'
       ]);
        $requestData = $request->all();
        
        $comment = Comment::findOrFail($id);
        $comment->update($requestData);

        return redirect('admin/comments')->with('flash_message', 'Comment updated!');
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
        Comment::destroy($id);

        return redirect('admin/comments')->with('flash_message', 'Comment deleted!');
    }
    public function storeComment(Request $request)
    {
        if (Auth::check()) {
         $this->validate($request, [
            'comment' => 'required',
            'post_id' => 'required'
        ]);
         $requestData = $request->all();
         $requestData['user_id']=Auth::user()->id;

         $newComment=Comment::create($requestData);
         
         $data='<div class="panel panel-white post panel-shadow"><div class="post-heading"><div class="pull-left image"><img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image"></div><div class="pull-left meta"><div class="title h5"><a href="#"><b>'.Auth::user()->name.'</b></a>made a post.</div><h6 class="text-muted time">'.$newComment->created_at.'</h6></div></div> <div class="post-description"> <p>'.$newComment->comment.'</p><div class="stats"><a href="#" class="btn btn-default stat-item"><i class="fa fa-thumbs-up icon"></i></a><a href="#" class="btn btn-default stat-item"><i class="fa fa-thumbs-down icon"></i></a></div></div></div>';
         $res=['status'=>true,'message'=>'Comment added!','newComment'=>$data];
         return  json_encode($res);
     }else{

        $res=['status'=>false,'message'=>'You have to login first to comment.'];
        return  json_encode($res);
    }

}

public function storeLike(Request $request)
{   

    if (Auth::check()) {
        $this->validate($request, [
            'comment_id' => 'required',
        ]);
        $requestData = $request->all();
        $requestData['user_id']=Auth::user()->id;
        $checklike=Like::where('deleted_at',NULL)->where('comment_id',$request->comment)->orwhere('user_id',Auth::user()->id)->first();
     
        $checkDislike=Dislike::where('deleted_at',NULL)->where('comment_id',$request->comment)->orwhere('user_id',Auth::user()->id)->first();
        
        if($checkDislike){
            
            $delt=Dislike::find($checkDislike->id);
            $delt->delete();
        }

        if($checklike){
            $res=['status'=>false,'message'=>'You Already like this Comment.'];
            return  json_encode($res);
           
        }
        $newComment=Like::create($requestData);

        
        $res=['status'=>true,'message'=>'Like added!'];
        return  json_encode($res);
    }else{

        $res=['status'=>false,'message'=>'You have to login first to Like Comment.'];
        return  json_encode($res);
    }

}
public function storeDisLike(Request $request)
{   

    if (Auth::check()) {
        $this->validate($request, [
            'comment_id' => 'required',
        ]);
        $requestData = $request->all();
        $requestData['user_id']=Auth::user()->id;
        $checklike=Like::where('deleted_at',NULL)->where('comment_id',$request->comment)->orwhere('user_id',Auth::user()->id)->first();
     
        $checkDislike=Dislike::where('comment_id',$request->comment)->where('user_id',Auth::user()->id)->where('deleted_at','NULL')->first();
        
        if($checkDislike){
            
            $res=['status'=>false,'message'=>'You Already Dislike this Comment.'];
            return  json_encode($res);
        }

        if($checklike){
            $delt=Like::find($checklike->id);
            $delt->delete();
            
           
        }
        $newComment=Dislike::create($requestData);

        
        $res=['status'=>true,'message'=>'You DisLike the Comment!'];
        return  json_encode($res);
    }else{

        $res=['status'=>false,'message'=>'You have to login first to Like Comment.'];
        return  json_encode($res);
    }

}
}
