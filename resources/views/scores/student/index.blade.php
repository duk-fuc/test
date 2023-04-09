@extends('layout.base')
@section('page_title', 'Student scores: '.$rec->user->name)
@section('slot')

<form class="input-group input-group-dynamic mb-4" action="{{ route('Score.findbystu') }}" method="post">
    {{ csrf_field() }}
    <input type="search" name="keywords" class="form-control" placeholder="Search by student ID" aria-label="Recipient's username" aria-describedby="basic-addon2">
    <button class="btn bg-gradient-primary" type="submit"><i class="fas fa-search"></i></button>
  </form>
<div class="card">
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Subject name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Subject ID</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ASM 1</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ASM 2</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Final grade</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rows as $row)
                    <tr>
                        <td class="text-xs">{{$row->subject->name}}</td>
                        <td class="text-xs">{{$row->subject->code}}</td>
                        <td class="text-xs">{{$row->tp1}}</td>
                        <td class="text-xs">{{$row->tp2}}</td>
                        <td class="text-xs">{{$row->qt}}</td>
                        <td class="text-xs">{{$row->ck}}</td>
                        <td class="text-xs">{{$row->tk}}</td>
                        <td class="align-middle">
                            @if(in_array(auth()->user()->role, ['student']))
                            <a class="text-secondary font-weight-bold text-xs"
                                href="{{route('scores.request_edit.add', ['id' => $row->id])}}">Request to correct points</a>
                            @endif
                            @if(in_array(auth()->user()->role, ['teacher']))
                            <a class="text-secondary font-weight-bold text-xs"
                                href="{{route('scores.edit', ['id' => $row->id])}}">Edit</a> | 
                            <a class="text-secondary font-weight-bold text-xs"
                                href="{{route('scores.delete', ['id' => $row->id])}}">Delete</a> |
                            <a class="text-secondary font-weight-bold text-xs"
                                href="{{route('scores.create', ['id' => $row->id])}}">Add</a> |
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr><td class="align-middle text-secondary font-weight-bold text-xs">No data !</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop