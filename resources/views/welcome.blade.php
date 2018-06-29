@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card panel-shadow">
                <div class="card-header">
                    <div class="input-group col-md-4">
                        <input class="form-control py-2" type="search" value="search" id="example-search-input">
                        <span class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/137857207" allowfullscreen></iframe>
                    </div>
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
            </div>
            <div class="card panel-shadow">
                <div class="card-header">
                    <div class="input-group col-md-4">
                        <h3>Comments</h3>
                    </div>
                </div>
                <div class="card-body row">
                    <div class="col-lg-10 col-10">
                        <input type="text" class="form-control" placeholder="write comments ...">
                    </div>
                    <div class="col-2">
                        <span class="send-icon"><a href="http://nicesnippets.com/" target="_blank"><i class="fa fa-paper-plane" aria-hidden="true"></i></a></span>
                    </div>
                </div>
            </div>
            <div class="panel panel-white post panel-shadow">
                <div class="post-heading">
                    <div class="pull-left image">
                        <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                    </div>
                    <div class="pull-left meta">
                        <div class="title h5">
                            <a href="#"><b>Ryan Haywood</b></a>
                            made a post.
                        </div>
                        <h6 class="text-muted time">1 minute ago</h6>
                    </div>
                </div> 
                <div class="post-description"> 
                    <p>Bootdey is a gallery of free snippets resources templates and utilities for bootstrap css hmtl js framework. Codes for developers and web designers</p>
                    <div class="stats">
                        <a href="#" class="btn btn-default stat-item">
                            <i class="fa fa-thumbs-up icon"></i>2
                        </a>
                        <a href="#" class="btn btn-default stat-item">
                            <i class="fa fa-thumbs-down icon"></i>12
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card panel-shadow">
                <div class="card-header">
                    <div class="input-group col-md-4">
                       <center><span>Up Next</span></center>
                   </div>
               </div>
               <div class="card-body">


                <ul class="list-group">
                    <li class="list-group-item"> <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/QpbQ4I3Eidg?ecver=1" frameborder="0" allowfullscreen></iframe>
                        <label class="form-control label-warning text-xs-center">Machine Gun - Bad Things</label>
                    </li>
                    <li class="list-group-item"> <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/QpbQ4I3Eidg?ecver=1" frameborder="0" allowfullscreen></iframe>
                        <label class="form-control label-warning text-xs-center">Machine Gun - Bad Things</label>
                    </li>
                    <li class="list-group-item"> <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/QpbQ4I3Eidg?ecver=1" frameborder="0" allowfullscreen></iframe>
                        <label class="form-control label-warning text-xs-center">Machine Gun - Bad Things</label>
                    </li>
                    <li class="list-group-item"> <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/QpbQ4I3Eidg?ecver=1" frameborder="0" allowfullscreen></iframe>
                        <label class="form-control label-warning text-xs-center">Machine Gun - Bad Things</label>
                    </li>
                    <li class="list-group-item"> <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/QpbQ4I3Eidg?ecver=1" frameborder="0" allowfullscreen></iframe>
                        <label class="form-control label-warning text-xs-center">Machine Gun - Bad Things</label>
                    </li>
                </ul>

            </div>
        </div>
    </div>

</div>

</div>
@endsection


