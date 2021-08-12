<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    @include("admin.admincss")
  </head>
  <body>
    
        @include("admin.navbar")
        <!-- partial -->
        <div class="main-panel">
          <form class="form-sample" action="{{ url('/reservationsearch') }}" method="GET" style="padding-left: 150px; padding-right: 150px;">
            @csrf
          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control" name="search" placeholder="Customer's Order" aria-label="Customer's Order" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-sm btn-primary" type="submit">Search</button>
              </div>
            </div>
          </div>
        </form>
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Reservation Page </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
              </nav>
            </div>
            <div class="row">
    			<div class="col-lg-12 grid-margin stretch-card">
             	<div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Reservation table</h4>
                    <p class="card-description"> Add class <code>.table-dark</code>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Phone </th>
                            <th> Guest </th>
                            <th> Date </th>
                            <th> Time </th>
                            <th> Message </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          	$sn = 0;
                          ?>
                          @foreach($reservations as $reservation)
                          	<?php
                          		$sn += 1;
                          	?>
	                        <tr>
	                          <td> {{$sn}} </td>
	                          <td> {{$reservation->name}} </td>
	                          <td> {{$reservation->email}} </td>
                            <td> {{$reservation->phone}} </td>
                            <td> {{$reservation->guest}} </td>
                            <td> {{$reservation->date}} </td>
                            <td> {{$reservation->time}} </td>
                            <td> {{$reservation->message}} </td>
	                          <td> <a href="{{url('/deletereservation',$reservation->id)}}" ><label class="badge badge-danger" style="cursor: pointer;">Delete</label></a> </td>
	                        </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            	</div>   
        	</div>
          </div>
        </div>
        @include("admin.adminscript")

  </body>
</html>