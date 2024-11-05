


@extends('admin.layouts.main')
@section('main-content')
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                     
                      
                       
                        <div class="row">
                            <div class="col-lg-8">
                     <h2>Manage Color</h2>
                               <div class="card">
                                <div class="card-header">Manage Color</div>
                                <div class="card-body">
                                    <div class="card-title">
                                        
                                    </div>
                                    <hr>
                                    <form action="{{route('color.manage_color_process')}}" method="post" novalidate="novalidate">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$res['id']}}">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Color</label>
                                            <input id="color" name="color" type="text" class="form-control"  value="{{$res['color']}}" > 
                                            @error('color')
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























