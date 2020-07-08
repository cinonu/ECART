@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    {{-- <div class="card-header">Edit Coupons #{{ $coupon->id }}</div> --}}
                    <div class="card-body">
                        <a href="{{ url('/admin/coupons') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                       
                        {!! Form::model($coupon, [
                            'method' => 'PATCH',
                            'url' => ['/admin/coupons',{{--  $coupon->id --}}],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.coupons.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
