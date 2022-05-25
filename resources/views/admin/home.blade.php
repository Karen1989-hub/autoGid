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
                    <h4 class="card-title">Добовление экскурсии</h4>                    
                    <form action="{{route('createExcursion')}}" enctype="multipart/form-data" method="post" class="forms-sample">
                    @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Название</label>
                        <input name='title' type="text" class="form-control" id="exampleInputName1" placeholder="Название" value="{{ old('title') }}">
                        @error('title')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Адрес</label>
                        <input name='address' type="text" class="form-control" id="exampleInputEmail3" placeholder="Адрес" value="{{ old('address') }}">
                        @error('address')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Время</label>
                        <input name='time' type="time" class="form-control" id="exampleInputPassword4" placeholder="Время" value="{{old('time')}}">
                        @error('time')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword5">Сложность</label>
                        <select name="complexity" class="form-control" id="exampleInputPassword5" >
                          <option value="Легкая">Легкая</option>
                          <option value="Средная">Средная</option>
                          <option value="Сложная">Сложная</option>
                        </select>
                        @error('complexity')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword6">Тип экскурсии</label>
                        <select name="type" class="form-control" id="exampleInputPassword6" >
                          <option name="OnFoot">Пешая</option>
                          <option name="Bicycle">Велосипедная</option>
                          <option name="withCar">С машиной</option>
                        </select>
                        @error('type')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="distance">Дистанция</label>
                        <input name='distance' type="number" class="form-control" id="distance" placeholder="Дистанция" value="{{old('distance')}}">
                        @error('distance')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea name='description' class="form-control" id="description" rows="4">{{old('description')}}</textarea>
                        @error('description')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="price">Цена</label>
                        <input name='price' type="number" class="form-control" id="price" placeholder="Цена" value="{{old('price')}}">
                        @error('price')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Загрузить изображение</label>
                        <input type="file" name="img" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="загрузка картини" >
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
