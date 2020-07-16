<?php
?>
@extends('layouts.app')

@section('content')
    <h1>Practive</h1>
    <div class="panel-body">
        <form action="{{url('seach')}}" method="get" class="form-horizontal">
            {{csrf_field()}}

            {{--ten task--}}
            <div class="form_group">
                <label for="seach" class="col-sm-3 control-label">Seach</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            {{--nut task--}}
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i>Seach task
                    </button>
                </div>
                <div class="panel panel-default">
                    @foreach($posts as $post)
                        <div>{{$post->id}}</div>
                        <div>{{$post->title}}</div>
                        <div>{{$post->price}}</div>
                        <div><img src="{{url(asset($post->images))}}"></div>
                        <div>
                            <form action="delete/{{$post->id}}" method="get">
                                <button>Delete</button>
                                <input type="hidden" name="_method" value="DELETE">
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </form>
    </div>
@endsection

