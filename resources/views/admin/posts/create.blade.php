@extends('admin.layouts.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Добавить новый пост</h1>
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
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <form role="form" action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Название</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Новый пост">
                        <div class="form-group">
                            <label>Краткое Описание</label>
                            <textarea name="description" class="form-control" id="description" rows="5" placeholder="Описание ..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>Контент</label>
                            <textarea name="content" class="form-control" id="content" rows="5" placeholder="Контент ..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="is_main">Главная Новость</label>
                            <select class="form-control" id="is_main" name="is_main">
                                <option value="0" selected="selected">Нет</option>
                                <option value="1">Да</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select class="form-control" id="category_id" name="category_id">
                                @foreach($categories as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Multiple</label>
                            <select name="tags[]" id="tags" class="select2" multiple="multiple" data-placeholder="Select tags" style="width: 100%;">
                                @foreach($tags as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                                    @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">File Изображение</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" id="image" class="custom-file-input"">
                                    <label class="custom-file-label" for="thumbnail">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>

        </section>
        <!-- /.content -->
    </div>
@endsection
