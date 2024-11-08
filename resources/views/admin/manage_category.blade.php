


@extends('admin.layouts.main')
@section('main-content')
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                     
                      
                       
                        <div class="row">
                            <div class="col-lg-8">
                     <h2>Manage Category</h2>
                               <div class="card">
                                <div class="card-header">Manage Category</div>
                                <div class="card-body">
                                    <div class="card-title">
                                        
                                    </div>
                                    <hr>
                                    <form action="{{route('category.manage_category_process')}}" method="post" novalidate="novalidate">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$res['id']}}">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                            <input id="category_name" name="category_name" type="text" class="form-control"  value="{{$res['category_name']}}" > 
                                            @error('category_name')
                                            {{$message}}
                                            @enderror
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="cc-name" class="control-label mb-1">Category Slug</label>
                                            <input id="category_slug" name="category_slug" type="text" class="form-control" value="{{$res['category_slug']}}" >
                                            @error('category_slug')
                                            {{$message}}
                                            @enderror
                                        </div>
                                      
                                        <div>
                                            <button  type="submit" class="btn btn-lg btn-info btn-block">
                                               Submit
                                              
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                                   
                                </div>
                            </div>
                           
                        </div>
                       
  @endsection()























