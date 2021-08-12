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
          <form class="form-sample" action="{{ url('/chefsearch') }}" method="GET" style="padding-left: 150px; padding-right: 150px;">
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
              <h3 class="page-title"> Chefs Page </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
              </nav>
            </div>
            <div class="row">
            	 <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Chef Update Form</h4>
                    <p class="card-description"> Chef Update Form </p>
                    <form class="forms-sample" action="{{ url('/uploadchef') }}" method="POST" enctype="multipart/form-data">
                    	@csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Enter Name" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Speciality</label>
                        <input type="num" name="speciality" class="form-control" id="exampleInputPassword4" placeholder="Enter Speciality" required>
                      </div>
                      <div class="form-group">
                      	<label for="formFile">Image</label>
                      	<input type="file" name="image" class="form-control-file" placeholder="Upload  Image" required>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
    			<div class="col-lg-12 grid-margin stretch-card">
             	<div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Chefs table</h4>
                    <p class="card-description"> Add class <code>.table-dark</code>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Speciality </th>
                            <th> Image </th>
                            <th> Action </th>
                            <th> Action 2 </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          	$sn = 0;
                          ?>
                          @foreach($chefs as $chef)
                          	<?php
                          		$sn += 1;
                          	?>
	                        <tr>
	                          <td> {{$sn}} </td>
	                          <td> {{$chef->name}} </td>
	                          <td> {{$chef->speciality}} </td>
	                          <td> <img style="height: 100px; width: 100px;" src="/chefimages/{{$chef->image}}"> </td>
	                          <td> <a href="{{url('/updatechef',$chef->id)}}" ><label class="badge badge-warning" style="cursor: pointer;">Update</label></a> </td>	
	                          <td> <a href="{{url('/deletechef',$chef->id)}}" ><label class="badge badge-danger" style="cursor: pointer;">Delete</label></a> </td>	
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