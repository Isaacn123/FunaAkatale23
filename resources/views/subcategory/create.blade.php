@extends('layouts.admin')


@section('content')

<div class="card card-default">


@if($errors->all())

<div class="alert alert-danger">
  
    <div class="list-group">
     <ul class="list-group">
          
    @foreach($errors->all() as $error)

    <li class="list-group-item">
        {{$error}}
    </li>


    @endforeach

     </ul>
    </div>

 

</div>

@endif

    <div class="card-header">
        Add SubCategory
    </div>

    <div class="card card-body">
    
                <form action="{{route('sub-category.store')}}" method="post">

                @csrf

                  <div class="form-group">
                      <label for="selectcategory">select Category</label>
                      <select name="category_id" id="selectcategory" class="form-control">
                      <option value="" selected disabled hidden>Choose Category here</option>
                       @foreach($categories as $category)
                      <option value="{{ $category->id }}" >{{$category->name}}</option>
                       @endforeach
                      </select>
                  </div>

                    <div class="form-group">
                         <label for="subcategoryName">SubCategory Name</label>
                        <input type="text" id="subcategoryName" name="subcategoryname"  placeholder="SubCategory Name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="enter Slug">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary">Add SubCategory</button>
                    </div>
                </form>
    
    </div>
</div>




@endsection