@extends('layouts.main')
@section('header')
  @parent
@endsection
    <div class="container-scroller">
      
@include('layouts.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">        
        @include('layouts.navbar')
        <!-- partial -->
        <div class="main-panel">
        {{-- content area start --}}
        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Проверить доступность завидения на карте</h4>                
                                 
                     <form action="{{route('addEstablishment')}}" enctype="multipart/form-data" method="post" class="forms-sample">
                    @csrf             
                                        
                    
                      <div class="form-group">
                        <label for="exampleInputName2">Широта</label>
                        <input name='latitude' type="text" class="form-control" id="exampleInputName2" placeholder="Название" value="{{old('latitude')}}">
                        @error('title')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName3">Долгота</label>
                        <input name='longitude' type="text" class="form-control" id="exampleInputName3" placeholder="Название" value="{{old('longitude')}}">
                        @error('title')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>                     
                                  
                      <button type="submit" class="btn btn-primary mr-2">Поиск</button>                      
                    </form>                  
                           
                  </div>               
                </div>
              </div>
          {{-- content area end --}}  
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
@include('layouts.footer')    