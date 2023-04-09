@extends('layout.base')
@section('page_title', isset($rec) ? 'Teacher update: '.$rec->name : 'Add teachers')
@section('slot')
<form id="form" class="text-start" method="POST"
    action="{{isset($rec) ? route('teachers.update', ['id' => $rec->id]) : route('teachers.create')}}">
    {{ csrf_field() }}
    <label class="form-label mt-3">Full name *</label>
    <div class="input-group input-group-outline">
        <input type="text" name="name" class="form-control" required value="{{$rec->name ?? old('name') ?? ''}}">
    </div>

    <label class="form-label mt-3">User *</label>
    <div class="input-group input-group-outline">
        <input type="text" name="username" class="form-control" required value="{{$rec->username ?? old('username') ?? ''}}">
    </div>

    <label class="form-label mt-3">Email *</label>
    <div class="input-group input-group-outline">
        <input type="email" name="email" class="form-control" required value="{{$rec->email ?? old('email') ?? ''}}">
    </div>

    <label class="form-label mt-3">Password {{isset($rec) ? '' : '*'}}</label>
    <div class="input-group input-group-outline">
        <input type="password" name="password" class="form-control input-outline" {{isset($rec) ? '' : 'required'}}>
    </div>
    <input type="submit" class="btn bg-gradient-primary my-4 mb-2" value="{{ isset($rec) ? 'Update' : 'Add'}}">
</form>
@stop