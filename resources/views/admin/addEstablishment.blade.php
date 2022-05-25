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
                    <h4 class="card-title">Добавить зовeдение</h4>                
                                 
                    <form action="{{route('addEstablishment')}}" enctype="multipart/form-data" method="post" class="forms-sample">
                    @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Название</label>
                        <input name='title' type="text" class="form-control" id="exampleInputName1" placeholder="Название" value="{{old('title')}}">
                        @error('title')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>  
                      <div class="form-group">
                        <label for="exampleInputName1">Адрес</label>
                        <input name='address' type="text" class="form-control" id="exampleInputName1" placeholder="Название" value="{{old('address')}}">
                        @error('title')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Ростояние</label>
                        <input name='distance' type="text" class="form-control" id="exampleInputName1" placeholder="Название" value="{{old('distance')}}">
                        @error('title')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Время работы</label>
                        <input name='time' type="text" class="form-control" id="exampleInputName1" placeholder="Название" value="{{old('time')}}">
                        @error('title')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
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
                      <div class="form-group">
                        <label>Загрузить изображение</label>
                        <input type="file" name="img" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="загрузка картини">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Загрузка</button>
                          </span>                         
                        </div>
                      </div>
                                  
                      <button type="submit" class="btn btn-primary mr-2">Добавить</button>
                      <button class="btn btn-dark">Сброс</button>
                    </form>                    
                           
                  </div>               
                </div>
              </div>
          {{-- content area end --}}  
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
@include('layouts.footer')    