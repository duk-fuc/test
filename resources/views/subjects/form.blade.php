@extends('layout.base')
@section('page_title', isset($rec) ? 'Update subjects: '.$rec->name : 'Add subjects')
@section('slot')
<form id="form" class="text-start" method="POST"
    action="{{isset($rec) ? route('subjects.update', ['id' => $rec->id]) : route('subjects.create')}}">
    {{ csrf_field() }}
    <label class="form-label mt-3">Subject name *</label>
    <div class="input-group input-group-outline">
        <input type="text" name="name" class="form-control" required value="{{$rec->name ?? old('name') ?? ''}}">
    </div>

    <label class="form-label mt-3">Subject ID *</label>
    <div class="input-group input-group-outline">
        <input type="text" name="code" class="form-control" required value="{{$rec->code ?? old('code') ?? ''}}">
    </div>

    <label class="form-label mt-3">Semester *</label>
    <div class="input-group input-group-outline">
        <input type="number" name="semester" class="form-control" required value="{{$rec->semester ?? old('semester') ?? ''}}">
    </div>

    <label class="form-label mt-3">Teacher</label>
    <div class="overflow-auto" style="max-height: 50vh;">
        @foreach($teachers as $row)
        @php
        $check = false;
        if(isset($teacher_subject_list))
            foreach($teacher_subject_list as $index => $roww) {
                if($roww->teacherProfile->id == $row->profile->id) {
                    $check = true;
                    unset($teacher_subject_list[$index]);
                    break;
                }
            }
        @endphp
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="teacher_id[]"
                value="{{$row->profile->id??''}}" {{ $check ? 'checked' : '' }}>
            <label class="custom-control-label" for="customRadio1">{{$row->name}}</label>
        </div>
        @endforeach
    </div>

    <input type="submit" class="btn bg-gradient-primary my-4 mb-2" value="{{ isset($rec) ? 'Update' : 'Add'}}">
</form>
@stop