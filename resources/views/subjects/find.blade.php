@extends('layout.base')
@section('page_title', 'The subject of search')
@section('slot')

<form class="input-group input-group-dynamic mb-4" action="{{ route('subjects.find') }}" method="post">
    {{ csrf_field() }}
    <input type="search" name="keywords" class="form-control" placeholder="Subject search" aria-label="Recipient's username" aria-describedby="basic-addon2">
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
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Semester</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rows as $row)
                    <tr>
                        <td class="text-xs">{{$row->name}}</td>
                        <td class="text-xs">{{$row->code}}</td>
                        <td class="text-xs">{{$row->semester}}</td>
                        <td class="align-middle">
                            @if(in_array(auth()->user()->role, ['teacher']))
                            <a class="text-secondary font-weight-bold text-xs"
                                href="{{route('subjects.edit', ['id' => $row->id])}}">Edit</a> | 
                            <a class="text-secondary font-weight-bold text-xs"
                                href="{{route('subjects.delete', ['id' => $row->id])}}">Delete</a>
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