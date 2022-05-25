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
                    <h4 class="card-title">Выберите экскурсию</h4>                    
                    <form action="{{route('showAddDostoprimToExcursPage')}}" enctype="multipart/form-data" method="get" class="forms-sample">
                            
                                            
                      <div class="form-group">                       
                        <select style="color:white" name="id" class="form-control" id="exampleInputPassword5" >
                        @foreach ($excursions_list as $excursion)
                            <option style="color:white" value="{{$excursion->id}}">{{$excursion->title}}</option>
                        @endforeach                         
                          
                        </select>
                        @error('complexity')
                        <p style="color:red">Это поле не может быть пустым</p>
                        @enderror
                      </div>          
                                         
                      <button type="submit" class="btn btn-primary mr-2">Выбрать</button>
                    </form>                  
                                          
                  @if($excursions != null) 
                  <h5 class="card-title">Список Достопримечательностей</h5>
                    @foreach ($excursions as $excursion)
                        @php
                          $n = 1;
                        @endphp
                        <p>Из {{$excursion->title}}</p>
                        @foreach ($excursion->dostoprim as $dostoprim)
                            <p>{{$n++}}. {{$dostoprim->title}} 
                            <a href="/autogid/public/admin/deleteDostoprimRilation/{{$excursion->id}}/{{$dostoprim->id}}"><i style="margin-left:20px;color:red;" class="remove mdi mdi-close-box"></i></a>
                            </p>
                        @endforeach
                    @endforeach 
                    <h5 class="card-title">Закрепить достопримечательность</h5>               
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
                  @else
                  <h5 class="card-title">Выберите достопримечательность</h5>  
                  @endif 
                    
                  </div>                  

                </div>
              </div>
        {{-- content area end --}}  
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
@include('layouts.footer')    