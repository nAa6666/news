@extends('admin.layout')
@section('title', 'Admin - News')
@section('admin.content')
    <div class="head-bar">
        <h1>News</h1>
        <a class="btn-primary" href="{{route('admin.news.create')}}">Add news</a>
    </div>

    @php if(session()->has('success')) $success = session()->get('success'); @endphp

    @if(isset($success))
        <div class="alert alert-success">
            <span>{{ $success }}</span>
        </div>
    @endif

    @if($news->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="40%">Name</th>
                    <th width="15%">Status</th>
                    <th width="15%">Data</th>
                    <th width="25%">Option</th>
                </tr>
            </thead>
            <tbody>
            @foreach($news as $index=>$item)
                <tr>
                    <td width="5%">{{$index + 1}}</td>
                    <td width="40%"><a class="link" href="{{route('admin.news.show', $item->id)}}">{{$item->name}}</a></td>
                    <td width="15%">{{!$item->status ? 'Active' : 'Inactive'}}</td>
                    <td width="15%">{{$item->date}}</td>
                    <td width="25%">
                        <div class="table_option">
                            <a class="btn-primary btn-green" href="{{route('admin.news.edit', $item->id)}}">Edit</a>
                            <form action="{{route('admin.news.destroy', $item->id)}}" method="post">
                                @csrf @method('DELETE')
                                <button class="btn-primary btn-red" type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>No news at the moment...</p>
    @endif
    <div class="pagination">
        {!! $news->links() !!}
    </div>
@endsection
