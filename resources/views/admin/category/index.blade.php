@extends('layouts.app')
@section('title', getConfig('title') . '- Kategori')
@section('content')             
                <div class="row">    
                    <!-- Start col -->
                    <div class="col-lg-7">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title"> Kategori</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">KATEGORI</th>
                                                <th scope="col">AKSI</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach ($category as $key => $value)
                                            <tr>
                                                <th scope="row">{{ $value->id }}</th>
                                                <td>{{ $value->category_name }}</td>
                                                <td>
                                                    <a href="javascript: void(0);" onclick="detail('{{ route('category.show', $value->id) }}')" class="btn btn-info btn-sm"><i class="fa fa-search fa-fw"></i></a>
                                                    <a href="javascript: void(0);" onclick="detail('{{ route('category.edit', $value->id) }}')" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-fw"></i></a> 
                                                    <a href="javascript: void(0);" onclick="confirm_delete('{{ route('category.destroy', $value->id) }}')" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-fw"></i></a> 
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>            
                                </div>
                                {!! $category->links() !!}
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                    <div class="col-md-5">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title"> <i class="fa fa-plus"></i> Tambah Kategori</h5>
                            </div>
                            <div class="card-body">
                      
                                <form method="POST" action="{{ route('category.store') }}" class="form-horizontal">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group row">
                                        <label class="col-md-12">Nama Kategori</label>
                                        <div class="col-md-12">
                                            <input type="text" name="category_name" class="form-control" placeholder="Nama Kategori">
                                        </div>
                                    </div>
                                    <center>   
                                        <button type="submit" class="btn btn-success" >
                                                Tambah
                                        </button>
                                        <button type="reset" class="btn btn-danger">
                                                Reset
                                        </button>
                                    </center>   
                                </form>                                
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
@endsection