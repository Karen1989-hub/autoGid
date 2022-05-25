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
                    <h4 class="card-title">Редактировать экскурсии</h4>                    
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> Название </th>
                            <th>  </th>
                            <th>  </th>                            
                          </tr>
                        </thead>
                        <tbody>
                        
                          @foreach ($excursions as $excursion)
                          <tr>                            
                            <td style='color:white'> {{$excursion->title}} </td>
                            <td>                            
                                <a href="/autogid/public/admin/showEditExcursById/{{$excursion->id}}"><button type="button" class="btn btn-outline-primary btn-fw">Редактировать</button></a>
                            </td>
                            <td style='color:white;'>
                                <a href="/autogid/public/admin/deleteExcursion/{{$excursion->id}}"><button type="button" class="btn btn-outline-danger btn-fw">Удалить экскурсию</button></a>
                            </td>     
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