@extends('backend.master')
@section('title','Email follow của khách')


<div id="layoutSidenav_content" class="col-md-12">
    <main>
        <div class="container-fluid">
            <div class="card mb-4">
                 <h1 class="mt-4">Email Follow Coron Page</h1>
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Email</th>
                                              
                                                <th>Thời gian</th>
                                              
                                               
                                            </tr>
                                        </thead>
                                        <tbody>   
                                      @foreach($list as $ls)                                     
                                            <tr>
                                                <td>{{$ls->fl_email}}</td>
                                                <th>{{date('d/m/Y H:i',strtotime($ls->created_at))}}</th>                                      
                                            </tr>
                                          @endforeach
                                        </tbody>                                        
                                    </table>
                                </div>
                            </div>
            </div>
        </div>
    </main>
</div>


@section('main')
@stop