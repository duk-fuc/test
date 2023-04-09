@extends('layout.base')
@section('page_title', 'Grade points: '. $rec->name)
@section('slot')

<form class="input-group input-group-dynamic mb-4" method="get">
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
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Full name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Studnet ID</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Subject name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Subject ID</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ASM 1</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ASM 2</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Final grade</th>
                        
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($arr as $row)
                    <tr>
                        <td class="text-xs">{{$row['user_name']}}</td>
                        <td class="text-xs">{{$row['code']}}</td>
                        <td class="text-xs">{{$row['subject_name']}}</td>
                        <td class="text-xs">{{$row['subject_code']}}</td>
                        <td class="text-xs">{{$row['tp1']}}</td>
                        <td class="text-xs">{{$row['tp2']}}</td>
                        <td class="text-xs">{{$row['tk']}}</td>
                        <td class="align-middle">
                            <a class="text-secondary font-weight-bold text-xs"
                                href="{{route('scores.edit', ['id' => $row['id']])}}">Edit</a> | 
                            <a class="text-secondary font-weight-bold text-xs"
                                href="{{route('scores.delete', ['id' => $row['id']])}}">Delete</a>
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