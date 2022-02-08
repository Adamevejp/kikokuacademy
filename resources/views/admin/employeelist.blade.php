@extends('layouts.adminportal')
@section('content')
  <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Information</h1>
          </div>
           
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12"> 
            <div class="card">
              <div class="card-header">
                      <a href="{{url('/')}}/addemployee"><button class="btn  btn-primary">Add Employee</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th></th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Japanese Mobile</th>
                    <th>Visa Type</th>
                     <th>Visa Expire date</th>
                     <th>Period of Validity of residence card</th>
                     <th>Starting Day</th>
                     <th>Employee status</th>
                     <th>Paid Holiday</th>  
                     <th>Issue Date</th>
                    <th>Date Of Birth</th>
                    <th>View</th>
                  </tr> 
                  </thead>
                  <tbody>
                  @if(isset($employeedata))   
                   @foreach($employeedata as $k =>$employee) 
                  <tr>
                    <td><a href="{{url('/EmployeeDetails/')}}/{{$employee->id}}"><i class="fa fa-eye" aria-hidden="true"></i></a> </td>
                    <td>{{$employee->first_name}}</td>
                    <td> {{$employee->last_name}} </td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->japanese_mobile}}</td>
                    <td>{{$employee->visa_status}}</td>
                    <td>-</td>
                    <td>{{$employee->residence_validity_date}}</td>
                    <td>{{$employee->job_start_date}}</td>
                    <td>@if($employee->employee_status==1){{"Full Time"}} @else {{"Part Time"}} @endif</td>
                    <td>{{$employee->total_number_holiday}}</td>
                    <td>{{$employee->total_number_holiday}}</td>
                    <td>{{$employee->dob}}</td>
                    <td><a href="{{url('/EmployeeDelete/')}}/{{$employee->id}}" onclick="return confirmDelete();"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                  </tr>
                    @endforeach 
                  @endif
                   
                  </tbody>
               
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection 