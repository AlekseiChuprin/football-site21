@extends('admin.layouts.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                @if (session()->has('success'))
                    <div class="btn btn-success">
                        <h3>{{session('success')}}</h3>
                    </div>
                @endif

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Категории</h1>
                    </div>


                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            @if (session()->has('error'))
                <div class="btn btn-danger">
                    <h3>{{session('error')}}</h3>
                </div>
        @endif
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Список категорий</h2>

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li> - {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif



                </div>
                <div class="card-body">
                    <a href="{{route('categories.create')}}" class="btn btn-primary mb-3">Добавить новую категорию</a>
                    @if(count($categories))
                    <div class="table-responsive">

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Название</th>
                                <th>Slug</th>
                                <th style="width: 200px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->title}}</td>
                                <td>{{$category->slug}}</td>
                                <td><a href="{{route('categories.edit', ['category'=> $category->id])}}"
                                       class="btn btn-info btn-sm float-left mr-1">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <form
                                        action="{{route('categories.destroy', ['category' => $category->id])}}"
                                        method="post" class="float-left">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Подтвердите удаление')">
                                            <i
                                                class="fas fa-trash-alt"></i>
                                        </button>
                                    </form></td>
                            </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    @else
                        <p>Категорий нет</p>
                        @endif

                </div>
                <div class="card-footer clearfix">
                    {{ $categories->links() }}
                    {{--<ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>--}}
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
