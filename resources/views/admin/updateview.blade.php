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
                    <h4 class="card-title">Update Food</h4>
                    <p class="card-description"> Update Food </p>
                    <form class="forms-sample" action="{{ url('/updatefood',$food->id) }}" method="POST" enctype="multipart/form-data">
                    	@csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" name="title" value="{{$food->title}}" class="form-control" id="exampleInputName1" placeholder="Title" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Price</label>
                        <input type="num" name="price" value="{{$food->price}}" class="form-control" id="exampleInputPassword4" placeholder="Price" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" name="description" id="exampleTextarea1" rows="4" required>{{$food->description}}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="formFile">Old Image</label>
                        <img src="/foodimages/{{$food->image}}">
                      </div>
                      <div class="form-group">
                        <label for="formFile">New Image</label>
                        <input type="hidden" name="oldimage" value="{{$food->image}}" class="form-control-file" placeholder="Upload  Image">
                        <input type="file" name="image" class="form-control-file" placeholder="Upload  Image">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
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