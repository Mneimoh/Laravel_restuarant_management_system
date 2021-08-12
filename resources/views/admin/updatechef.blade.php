<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include("admin.admincss")
  </head>
  <body>
    
        @include("admin.navbar")
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Foods Form </h3>
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
                    <h4 class="card-title">Update Chef Form</h4>
                    <p class="card-description"> Update Chef Form </p>
                    <form class="forms-sample" action="{{ url('/updatefoodchef',$chef->id) }}" method="POST" enctype="multipart/form-data">
                    	@csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Chef Name</label>
                        <input type="text" name="name" value="{{$chef->name}}" class="form-control" id="exampleInputName1" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Chef speciality</label>
                        <input type="num" name="speciality" value="{{$chef->speciality}}" class="form-control" id="exampleInputPassword4" placeholder="speciality" required>
                      </div>
                      <div class="form-group">
                        <label for="formFile">Old Image</label>
                        <img style="height: 200px; width: 200px;" src="/chefimages/{{$chef->image}}">
                      </div>
                      <div class="form-group">
                        <label for="formFile">New Image</label>
                        <input type="hidden" name="oldimage" value="{{$chef->image}}" class="form-control-file" placeholder="Upload  Image">
                        <input type="file" name="image" class="form-control-file" placeholder="Upload Image">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Update Chef</button>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
    		  </div>
        </div>
        @include("admin.adminscript")

  </body>
</html>