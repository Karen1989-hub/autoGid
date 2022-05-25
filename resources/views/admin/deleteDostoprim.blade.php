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
                    <h4 class="card-title">Удаление достопримечательности</h4>                    
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>  </th>
                            <th> Название </th>
                            <th>  </th>                            
                          </tr>
                        </thead>
                        <tbody>  
                          @foreach ($dostoprims as $dostoprim)
                          <tr>                            
                            <td style='color:white'> {{$dostoprim->title}} </td>
                            <td>                            
                            @foreach ($dostoprim->dostoprimImage as $images)                   
                              <div style="display:inline-block;">
                              <img src="{{$images->dostoprim_img}}" class='img1' alt=""><br>
                              <a href="/autogid/public/admin/deletDostoprimImg/{{$images->id}}"><i style="margin-left:20px;color:red;" class="remove mdi mdi-close-box"></i></a>                            
                              </div>
                            @endforeach
                            </td>
                            <td style='color:white;'><a href="/autogid/public/admin/deletDostoprim/{{$dostoprim->id}}"><button type="button" class="btn btn-outline-danger btn-fw">Удалить достопримечательность</button></a></td>           
                            
                          </tr>                     
                                                   
                          @endforeach                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
        {{-- content area end --}}  
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
@include('layouts.footer')    