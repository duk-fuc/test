@extends('layout.base')
@section('page_title', 'Class list')
@section('slot')

<form class="input-group input-group-dynamic mb-4" method="get">
    {{ csrf_field() }}
    <input type="search" name="keywords" class="form-control" placeholder="Search by class name" aria-label="Recipient's username" aria-describedby="basic-addon2">
    <button class="btn bg-gradient-primary" type="submit"><i class="fas fa-search"></i></button>
  </form>

<div class="card">
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Class name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Student</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    
                    @forelse($rows as $row)
                    <tr>
                        <td class="text-xs">{{$row['name']}}</td>
                        <td class="text-xs">{{$row['count']}}</td>
                        <td class="align-middle">
                            <a class="text-secondary font-weight-bold text-xs"
                                href="{{route('classes.view', ['id' => $row['id']])}}">List</a> | 
                            <a class="text-secondary font-weight-bold text-xs"
                                href="{{route('classes.edit', ['id' => $row['id']])}}">Edit</a> | 
                            <a class="text-secondary font-weight-bold text-xs"
                                href="{{route('classes.delete', ['id' => $row['id']])}}"><button type="submit" onclick="return confirm('Are you sure you want to delete ?')">Delete Class</button></a>
                        </td>
                    </tr>
                    @empty 
                    <tr><td colspan='3' class="align-middle text-secondary font-weight-bold text-xs">No data !</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop