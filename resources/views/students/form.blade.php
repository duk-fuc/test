@extends('layout.base')
@section('page_title', isset($rec) ? 'Student update: '.$rec->name : 'Add students: ')
@section('slot')
<form id="form" class="text-start" method="POST" action="{{isset($rec) ? route('students.update', ['id' => $rec->id]) : route('students.create')}}">
    {{ csrf_field() }}
    <label class="form-label mt-3">Full name *</label>
    <div class="input-group input-group-outline">
        <input type="text" name="name" class="form-control" required value="{{$rec->name ?? old('name') ?? ''}}">
    </div>

    <label class="form-label mt-3">Student ID *</label>
    <div class="input-group input-group-outline">
        <input type="text" name="code" class="form-control" required value="{{$rec->profile->code ?? old('code') ?? ''}}">
    </div>

    <label class="form-label mt-3">Date of birth *</label>
    <div class="input-group input-group-outline">
        <input type="date" name="dob" class="form-control" required value="{{isset($rec) ? date('Y-m-d', strtotime($rec->profile->dob)) : date('Y-m-d', time()) ?? ''}}">
        
    </div>

    <label class="form-label mt-3">Email *</label>
    <div class="input-group input-group-outline">
        <input type="email" name="email" class="form-control" required value="{{$rec->email ?? old('email') ?? ''}}">
    </div>

    <label class="form-label mt-3">Password {{isset($rec) ? '' : '*'}}</label>
    <div class="input-group input-group-outline">
        <input type="password" name="password" class="form-control input-outline" {{isset($rec) ? '' : 'required'}}>
    </div>
    <div class="row">
        <div class="col-12">
            <label class="form-label mt-3">Class *</label>
            <select name="class_id[]" class="js-example-basic-multiple form-control" multiple="multiple" required value="{{$rec->class_id ?? old('class_id') ?? ''}}">
                @foreach($classes as $class)
                <option value="{{$class->id}}" {{ isset($rec) && in_array($class->id, $rec->profile->class_id)  ? 'selected' : '' }}>
                    {{$class->name}}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <input type="submit" class="btn bg-gradient-primary my-4 mb-2" value="{{ isset($rec) ? 'Update' : 'Add'}}">
</form>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
@stop