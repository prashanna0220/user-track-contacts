@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @if (count($errors))
            <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
            @endif

            @if(Session::has('message'))
            <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            {{ Session::get('message') }}
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Address Book</div>
                <div class="panel-body" style="overflow:auto; ">
                <form method="GET" action="{{ url('search') }}" class="navbar-form navbar-left" style="padding: 0px;">
                    <div class="input-group custom-search-form">
                        <input type="text" name="search" class="form-control" placeholder="Search ....">
                        <span class="input-group-btn">
                        <button type="submit" class="btn btn-default-sm">
                         <i class="glyphicon glyphicon-search"></i>
                        </button>
                        </span>
                    </div>
                </form>
                <h1 class="text-right" style="margin: 0px 0px 10px;">
                <a href="#myModal" role="button" class="btn btn-primary btn-sm" data-toggle="modal">Add Contact</a>
                </h1>
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Organization/Company</th>
                            <th>Birthday</th>
                            <th>Edit/veiw</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($Usercontact as $Contact)
                          <tr>
                            <td>{{ $Contact->name }}</td>
                            <td>{{ $Contact->email }}</td>
                            <td>{{ $Contact->phone }}</td>
                            <td>{{ $Contact->address }}</td>
                            <td>{{ $Contact->company }}</td>
                            <td>{{ $Contact->dob }}</td>
                            <td class="text-center">
                            <button class="btn btn-primary btn-xs">
                            <a class="edit-delete" href="{{ url('show_data/'.$Contact->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                            </button>
                            </td>
                            <td class="text-center">
                            <button class="btn btn-danger btn-xs">
                            <a class="edit-delete"  href="delete/{{ $Contact->id }}"><span class="glyphicon glyphicon-trash"></span></a>
                            </button>
                            </td>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $Usercontact->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- Add Contact Modal -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add Contact</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal col-sm-12" method="post" action="{{ url('contact') }}">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <input class="form-control email" type="text" name="name" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <input class="form-control phone" type="text" name="phone" placeholder="Your Contact No.">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="address" placeholder="Your Address"></textarea>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="company" placeholder="Organization/Company" type="text">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="dob" id="datepicker" placeholder="Birthday" type="text">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success pull-left">Submit</button>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
            </div>
        </div>
    </div>
</div>
@endsection
