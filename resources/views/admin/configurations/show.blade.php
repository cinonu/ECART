@extends('admin')
@section('content')
<div class="content-wrapper">
        <div class="row">
             {{-- <div class="col-md-12"> --}}
           
           

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Configuration {{ $configuration->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/configurations') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/configurations/' . $configuration->id . '/edit') }}" title="Edit Configuration"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/configurations' . '/' . $configuration->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Configuration" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $configuration->id }}</td>
                                    </tr>
                                    <tr><th> Config Key </th><td> {{ $configuration->config_key }} </td></tr><tr><th> Config Value </th><td> {{ $configuration->config_value }} </td></tr><tr><th> Title </th></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    {{-- </div> --}}
</div>
@endsection
