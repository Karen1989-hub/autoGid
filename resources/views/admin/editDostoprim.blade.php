@extends('layouts.main')
@section('header')
  @parent
@endsection
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
@include('layouts.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('layouts.navbar')
        <!-- partial -->
        <div class="main-panel">
        {{-- content area start --}}
        <form action="{{route('showEditDostoprimPage')}}" method="get" class="forms-sample">        
                         
            <div class="form-group">                       
                <select style="color:white" name="id" class="form-control" id="exampleInputPassword5" >
                    @foreach ($dostoprims as $dost)
                        <option style="color:white" value="{{$dost->id}}">{{$dost->title}}</option>
                    @endforeach                         
                </select>
                @error('complexity')
                    <p style="color:red">Это поле не может быть пустым</p>
                @enderror
            </div>       
            <button type="submit" class="btn btn-primary mr-2">Выбрать</button>
        </form>     
        
          <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  @if(isset($dostoprim))
                  <div class="card-body">
                    <h4 class="card-title">Редоктировать Достопримечательность</h4>                    
                    <form action="{{route('updateDostoprim')}}" enctype="multipart/form-data" method="post" class="forms-sample">
                    @csrf
                      <input type="hidden" name="dostoprim_id" value="{{$dostoprim->id}}">
                      <div class="form-group">
                        <label for="exampleInputName1">Название</label>
                        <input name='title' type="text" class="form-control" id="exampleInputName1" placeholder="Название" value="{{$dostoprim->title}}">
                        @error('title')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Адрес</label>
                        <input name='address' type="text" class="form-control" id="exampleInputEmail3" placeholder="Адрес" value="{{$dostoprim->address}}">
                        @error('address')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputPassword5">Сложность</label>
                        <select name="complexity" class="form-control" id="exampleInputPassword5">
                          <option @if($dostoprim->complexity == 'Лёгкая') selected @endif value="Лёгкая">Лёгкая</option>
                          <option @if($dostoprim->complexity == 'Средняя') selected @endif value="Средняя">Средняя</option>
                          <option @if($dostoprim->complexity == 'Сложная') selected @endif value="Сложная">Сложная</option>
                        </select>
                        @error('complexity')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword6">Тип экскурсии</label>
                        <select name="type" class="form-control" id="exampleInputPassword6">
                          <option @if($dostoprim->type == 'Пешая') selected @endif>Пешая</option>
                          <option @if($dostoprim->type == 'Велосипедная') selected @endif >Велосипедная</option>
                          <option @if($dostoprim->type == 'С машиной') selected @endif >С машиной</option>
                        </select>
                        @error('type')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      
                      <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea name='description' class="form-control" id="description" rows="4">{{$dostoprim->description}}</textarea>
                        @error('description')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="price">Цена</label>
                        <input name='price' type="number" class="form-control" id="price" placeholder="Цена" value="{{$dostoprim->price}}">
                        @error('price')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="price">Широта</label>
                        <input name='latitude' type="text" class="form-control" id="price" placeholder="latitude" value="{{$dostoprim->latitude}}">
                        @error('latitude')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="price">Долгота</label>
                        <input name='longitude' type="text" class="form-control" id="price" placeholder="longitude" value="{{$dostoprim->longitude}}">
                        @error('longitude')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                     
                      <div class="form-group">
                        <label>Загрузить изображение</label>
                        <input type="file" name="img[]" multiple class="file-upload-default">
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
                  @endif
                </div>
              </div>
        {{-- content area end --}}  
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
@include('layouts.footer')          

