<?php
?>
@extends('layouts.app')

@section('content')
    <h1>Practive</h1>
    <div class="panel-body">
        <form action="{{url('search')}}" method="post" class="form-horizontal">
            {{csrf_field()}}

            {{--ten task--}}
            <div class="form_group">
                <label for="task" class="col-sm-3 control-label">Seach</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            {{--nut task--}}
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i>search
                    </button>
                </div>
            </div>
        </form>


        <form action="{{url('add')}}" method="get" class="form-horizontal">
            {{csrf_field()}}

            {{--ten task--}}
            <div class="form_group">
                <label for="task" class="col-sm-3 control-label">Add</label>
                <div class="col-sm-6">
                    <input type="text" name="title" id="task-name" placeholder="title" class="form-control">
                    <input type="text" name="price" id="task-name" placeholder="price" class="form-control">
                    <input type="text" name="images" id="task-name" placeholder="url images" class="form-control">
                </div>
            </div>

            {{--nut task--}}
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i>Add task
                    </button>
                </div>
            </div>
        </form>

        <form action="{{url('update')}}" method="get" class="form-horizontal">
            {{csrf_field()}}

            {{--ten task--}}
            <div class="form_group">
                <label for="task" class="col-sm-3 control-label">Update</label>

                <div class="col-sm-6">
                    <input type="text" name="id" id="task-name" placeholder="id" class="form-control">
                    <input type="text" name="title" id="task-name" placeholder="title" class="form-control">
                    <input type="text" name="price" id="task-name" placeholder="price" class="form-control">
                    <input type="text" name="images" id="task-name" placeholder="url images" class="form-control">
                </div>
            </div>

            {{--nut task--}}
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i>update
                    </button>
                </div>
            </div>
        </form>


        {{--        @if(count($posts)>0)--}}
        @foreach($posts as $post)
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>daada</th>
                </tr>
                <tr>
                    <th>{{$post->id}}</th>
                    <th>{{$post->title}}</th>
                    <th>{{$post->price}}</th>
                    <th><img src="{{url(asset($post->images))}}"></th>
                    <th>
                        <form action="delete/{{$post->id}}" method="get">
                            <button>Delete</button>
                            <input type="hidden" name="_method" value="DELETE">
                        </form>
                    </th>
                </tr>
            </table>
        @endforeach
        {{--        @endif--}}
    </div>
@endsection
