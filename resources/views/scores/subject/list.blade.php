@extends('layout.base')
@section('page_title', 'Select a subject to see the score')
@section('slot')

<form class="input-group input-group-dynamic mb-4" action="{{ route('Score.findbysub') }}" method="post">
    {{ csrf_field() }}
    <input type="search" name="keywords" class="form-control" placeholder="Search by subject ID" aria-label="Recipient's username" aria-describedby="basic-addon2">
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
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rows as $row)
                    <tr>
                        <td class="text-xs">{{$row->name}}</td>
                        <td class="text-xs">{{$row->code}}</td>
                        <td class="align-middle">
                            <a class="text-secondary font-weight-bold text-xs"
                                href="{{route('scores.subject', ['id' => $row->id])}}">Checkpoint</a>
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