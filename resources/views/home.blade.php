@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Address Book</div>
                <div class="panel-body" style="overflow:auto; ">
                <h1 class="text-right">
                <a href="#myModal" role="button" class="btn btn-primary btn-sm" data-toggle="modal">Add Contact</a>
                </h1>
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>S.No</th>
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
                          <tr>
                            <td>1</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                            <td>John</td>
                            <td>
                            <button class="btn btn-primary btn-xs">
                            <a href=""><span class="glyphicon glyphicon-pencil"></span></a>
                            </button>
                            </td>
                            <td>
                            <button class="btn btn-danger btn-xs">
                            <a href=""><span class="glyphicon glyphicon-trash"></span></a>
                            </button>
                            </td>
                        </tbody>
                    </table>
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
                <form class="form-horizontal col-sm-12">
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
                        <input class="form-control" name="dob" placeholder="Birthday" type="text">
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
