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
          <form class="form-sample" action="{{ url('/foodsearch') }}" method="GET" style="padding-left: 150px; padding-right: 150px;">
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
              <h3 class="page-title"> Foods Table </h3>
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
                    <h4 class="card-title">Foods Form</h4>
                    <p class="card-description"> Foods Form </p>
                    <form class="forms-sample" action="{{ url('/uploadfood') }}" method="POST" enctype="multipart/form-data">
                    	@csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Title" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Price</label>
                        <input type="num" name="price" class="form-control" id="exampleInputPassword4" placeholder="Price" required>
                      </div>
                      <div class="form-group">
                      	<label for="formFile">Image</label>
                      	<input type="file" name="image" class="form-control-file" placeholder="Upload  Image" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" name="description" id="exampleTextarea1" rows="4" required></textarea>
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
                    <h4 class="card-title">Foods table</h4>
                    <p class="card-description"> Add class <code>.table-dark</code>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Title </th>
                            <th> Price </th>
                            <th> Image </th>
                            <th> Description </th>
                            <th> Action </th>
                            <th> Action 2 </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          	$sn = 0;
                          ?>
                          @foreach($foods as $food)
                          	<?php
                          		$sn += 1;
                          	?>
	                        <tr>
	                          <td> {{$sn}} </td>
	                          <td> {{$food->title}} </td>
	                          <td> {{$food->price}} </td>
	                          <td> <img style="height: 100px; width: 100px;" src="/foodimages/{{$food->image}}"> </td>
	                          <td> {{$food->description}} </td>
	                          <td> <a href="{{url('/updateview',$food->id)}}" ><label class="badge badge-warning" style="cursor: pointer;">Update</label></a> </td>	
	                          <td> <a href="{{url('/deletefood',$food->id)}}" ><label class="badge badge-danger" style="cursor: pointer;">Delete</label></a> </td>	
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