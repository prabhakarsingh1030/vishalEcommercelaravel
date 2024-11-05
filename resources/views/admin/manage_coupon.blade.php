


@extends('admin.layouts.main')
@section('main-content')
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                     
                      
                       
                        <div class="row">
                            <div class="col-lg-8">
                     <h2>Manage Coupon</h2>
                               <div class="card">
                                <div class="card-header">Manage Coupon</div>
                                <div class="card-body">
                                    <div class="card-title">
                                        
                                    </div>
                                    <hr>
                                    <form action="{{route('coupon.manage_coupon_process')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$res['id']}}">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Coupon Title</label>
                                            <input id="title" name="title" type="text" class="form-control"  value="{{$res['title']}}" > 
                                            @error('title')
                                            {{$message}}
                                            @enderror
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="cc-name" class="control-label mb-1">Coupon Code</label>
                                            <input id="code" name="code" type="text" class="form-control" value="{{$res['code']}}" >
                                            @error('code')
                                            {{$message}}
                                            @enderror
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="cc-name" class="control-label mb-1">Coupon Value</label>
                                            <input id="value" name="value" type="text" class="form-control" value="{{$res['value']}}" >
                                            @error('value')
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























