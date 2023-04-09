@extends('layout.base')
@section('page_title', 'Select a semester to view grades')
@section('slot')
<div class="card">
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Semester</th>
                        
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rows as $row)
                    <tr>
                        <td class="text-xs">{{$row['semester']}}</td>
                        <td class="align-middle">
                            <a class="text-secondary font-weight-bold text-xs"
                                href="{{route('scores.semester', ['id' => $row['semester']])}}">Checkpoint</a>
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