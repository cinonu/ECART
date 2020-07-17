@extends('admin')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            @include('sidebar')

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Ticket-{{ $contact->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/Contactus')}}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        {{-- <a href="{{ url('/admin/product/' . $product->id . '/edit') }}" title="Edit product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                         --}}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $contact->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>USER ID</th>
                                        <td> {{ $contact->user_id}} </td>
                                    </tr>
                                    <tr>
                                        <th>E-mail</th>
                                        <td>{{$contact->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>SUBJECT</th>
                                        <td>{{$contact->Subject }}</td>
                                    </tr>
                                    <tr>
                                        <th>MESSAGE</th>
                                        <td> {{ $contact->Message}} </td>
                                    </tr>
                            <tr> 
                            <th>Your Response</th>
                            <td>   
                            <div>
                                 @if(Session::has('success'))
                                    <div class="alert alert-success text-center" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        {{Session::get('success')}}
                                    </div>
                                @endif
                            
                            </div>
                            <form action="{{route('reply_mail')}}" method="post">
                                @csrf
                                @method("POST")
                          <div class="form-group">
                            <label for="exampleInputEmail1">Subject</label>
                            <input type="input" class="form-control" name="subject" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Subject">
                            <small name="subject" id="emailHelp" class="form-text text-muted"></small>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Note</label>
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                          </div>
                          <input type="hidden" name="email" value="{{$contact->email }}">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        </td>
                       </tr>
                
                
                    </tbody>
                 </table>
                </div>
      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
