<style>
  .img1{
    width:100px!important;
    height:100px!important;
    border-radius:0%!important;
  }
</style>
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
        <div class='row'>
          <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Редактировать экскурсию</h4> 
                    <form action="{{route('updateExcursion')}}" enctype="multipart/form-data" method="post" class="forms-sample">
                    @csrf
                    <input type="hidden" name="excursion_id" value="{{$excursion->id}}">
                      <div class="form-group">
                        <label for="exampleInputName1">Название</label>
                        <input name='title' type="text" class="form-control" id="exampleInputName1" value="{{$excursion->title}}">
                        @error('title')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Адрес</label>
                        <input name='address' type="text" class="form-control" id="exampleInputEmail3" value="{{$excursion->address}}">
                        @error('address')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Время</label>
                        <input name='time' type="time" class="form-control" id="exampleInputPassword4" value="{{$excursion->time}}">
                        @error('time')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword5">Сложность</label>
                        <select name="complexity" class="form-control" id="exampleInputPassword5" >
                          <option @if($excursion->complexity == 'Лёгкая') selected @endif value="Лёгкая">Лёгкая</option>
                          <option @if($excursion->complexity == 'Средняя') selected @endif value="Средняя">Средняя</option>
                          <option @if($excursion->complexity == 'Сложная') selected @endif value="Сложная">Сложная</option>
                        </select>
                        @error('complexity')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword6">Тип экскурсии</label>
                        <select name="type" class="form-control" id="exampleInputPassword6" >
                          <option @if($excursion->type == 'Пешая') selected @endif>Пешая</option>
                          <option @if($excursion->type == 'Велосипедная') selected @endif >Велосипедная</option>
                          <option @if($excursion->type == 'С машиной') selected @endif >С машиной</option>
                        </select>
                        @error('type')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="distance">Дистанция</label>
                        <input name='distance' type="number" class="form-control" id="distance" value="{{$excursion->distance}}">
                        @error('distance')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea name='description' class="form-control" id="description" rows="4">{{$excursion->description}}</textarea>
                        @error('description')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="price">Цена</label>
                        <input name='price' type="number" class="form-control" id="price" value="{{$excursion->price}}">
                        @error('price')
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
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> Название<br>
                            достопримечательностей<br>
                            в экскурсии</th>
                            <th>  </th> 
                            <th>  </th>                            
                          </tr>
                        </thead>
                        <tbody>

                          @foreach ($excursion->dostoprim as $val)
                            <tr>
                              <th style="color:white">{{$val->title}}</th>
                              <th style="color:white">
                                @foreach ($val->dostoprimImage as $img)
                                  <div style="display:inline-block;">
                                    <img src="{{$img->dostoprim_img}}" class='img1' alt=""><br>
                                    <a href="/autogid/public/admin/deletDostoprimImg/{{$img->id}}"><i class="remove mdi mdi-close-box" style="color:red;cursor:pointer;"></i></a>                            
                                  </div> 
                                @endforeach
                              </th>
                              
                              <th style='color:white;'>
                              <a href="/autogid/public/admin/deleteDostoprimRilation/{{$excursion->id}}/{{$val->id}}">
                              <button type="button" class="btn btn-outline-danger btn-fw">Удалить<br> достопримечательность</button>
                              </a>
                              </th>                                                         
                            </tr>    
                          @endforeach                         
                                           
                        </tbody>
                      </table>
                      
                    </div>
                    
                  </div>
                  <h4>Добавить достопримечательность к экскурсии</h4>
                  <form action="{{route('addDostoprimRilation')}}" enctype="multipart/form-data" method="post" class="forms-sample">
                    @csrf                  
                        <input type="hidden" name="excurs_id" value="{{$id}}">                    
                      <div class="form-group">                                      
                        <select style="color:white" name="dostoprim_id" class="form-control" id="exampleInputPassword5">  
                        @foreach ($dostoprims as $dostoprim)     
                            <option style="color:white" value="{{$dostoprim->id}}">{{$dostoprim->title}}</option>
                        @endforeach                      
                          
                        </select>                       
                      </div>          
                                         
                      <button type="submit" class="btn btn-primary mr-2">Выбрать</button>                      
                  </form>
                </div>
              </div>
            </div>  
        {{-- content area end --}}  
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
@include('layouts.footer')    