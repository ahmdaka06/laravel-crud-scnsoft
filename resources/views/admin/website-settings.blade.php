@extends('layouts.app')
@section('title', getConfig('title') . '- Pengaturan Website')
@section('content')             
                <div class="row">    
                    <!-- Start col -->
                    <div class="col-md-12">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title"> <i class="mdi mdi-cogs"></i> Pengaturan Website</h5>
                            </div>
                            <div class="card-body">
                      
                                <form method="POST" action="{{ url('website-settings') }}" class="form-horizontal" enctype=multipart/form-data>
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="form-group row">
                                        <label class="col-md-12">Nama Website</label>
                                        <div class="col-md-12">
                                            <input type="text" name="title" class="form-control" value="{{ $options['title'] }}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-12">Meta Author Website</label>
                                        <div class="col-md-12">
                                            <input type="text" name="meta_author" class="form-control" value="{{ $options['meta_author'] }}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-12">Meta Deskripsi Website</label>
                                        <div class="col-md-12">
                                            <textarea  name="meta_description" class="form-control"  rows="7" cols="80">{{ $options['meta_description'] }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-12">Meta Keyword Website</label>
                                        <div class="col-md-12">
                                            <textarea  name="meta_keywords" class="form-control"  rows="7" cols="80">{{ $options['meta_keywords'] }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-12">Homepage Title Website</label>
                                        <div class="col-md-12">
                                            <textarea  name="home_page_title" id="summernote1" class="form-control"  rows="7" cols="80">{{ $options['home_page_title'] }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-12">Homepage Deskripsi Website</label>
                                        <div class="col-md-12">
                                            <textarea  name="home_page_description" id="summernote2" class="form-control"  rows="7" cols="80">{{ $options['home_page_description'] }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-12">Favicon</label>
                                        @if( ! is_null($options['favicon']) )
                                            <div class="col-md-12">
                                                <img src="{{ asset('admin/images/' . $options['favicon']) }}" width="50" height="50">
                                            <div style="height: 15px;"></div>
                                            </div>
                                        @endif
                                        <div class="col-md-12">
                                            <input type="file" class="form-control" value="" id="favicon" name="favicon">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-12">Logo</label>
                                        @if( ! is_null($options['logo']) )
                                            <div class="col-md-12">
                                                <img src="{{ asset('admin/images/' . $options['logo']) }}" width="50" height="50">
                                            <div style="height: 15px;"></div>
                                            </div>
                                        @endif
                                        <div class="col-md-12">
                                            <input type="file" class="form-control" value="" id="logo" name="logo">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-12">Small Logo</label>
                                        @if( ! is_null($options['small_logo']) )
                                            <div class="col-md-12">
                                                <img src="{{ asset('admin/images/' . $options['small_logo']) }}" width="50" height="50">
                                            <div style="height: 15px;"></div>
                                            </div>
                                        @endif
                                        <div class="col-md-12">
                                            <input type="file" class="form-control" value="" id="small_logo" name="small_logo">
                                        </div>
                                    </div>
                                    <center>   
                                        <button type="submit" class="btn btn-success" >
                                                Update
                                        </button>
                                    </center>   
                                </form>                                
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
                <script type="text/javascript">
                    $(document).ready(function() {
                        /* -- Form Editors - Summernote -- */
                        $('#summernote1').summernote({
                            height: 320,
                            minHeight: null,
                            maxHeight: null,
                            focus: true 
                        });
                        $('#summernote2').summernote({
                            height: 320,
                            minHeight: null,
                            maxHeight: null,
                            focus: true 
                        });
                    });
                </script>
@endsection