@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Update author info</h3>
                <hr>
                @include('includes.form_error')
                @if(session()->has('message.level'))
                    <div class="alert alert-{{ session('message.level') }}">
                        {!! session('message.content') !!}
                    </div>
                @endif
                {!! Form::model($author,['method' => 'PATCH', 'class'=>'form-horizontal', 'action' => ['AdminAuthorController@update',$author->id], 'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label('name','Name:',['class' => 'control-label col-sm-2']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('name',null, ['class' => 'form-control','id'=> 'name','placeholder' => 'Enter author name']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('photo_id','Upload photo:',['class' => 'control-label col-sm-2']) !!}
                    <div class="col-sm-10">
                        {!! Form::file('photo_id',null, ['class' => 'form-control','id'=>'photo']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('bio','Bio:',['class' => 'control-label col-sm-2']) !!}
                    <div class="col-sm-10">
                        {!! Form::textarea('bio',null, ['id' => 'bio']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-md-4">
                <img class="img img-responsive" style="max-width: 100%;" src="{{$author->photo ? $author->photo->file : '/img/author.jpg'}}" alt="">
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({selector: 'textarea'});</script>
@endsection