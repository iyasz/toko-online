@extends('layout.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="text-end mt-3">
                    <a href="/category" class="btn btn-primary rounded-1 border-0">Back</a>
                </div>
                <div class="card mt-4">
                    <div class="card-body mx-4">
                        <form action="/category/{{$category->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mt-3">
                                <label class="mb-2">Icon Lama :</label>
                                <p><img src="{{asset('storage/gambar/'.$category->icon)}}" alt=""></p>
                            </div>
                            <div class="mt-3">
                                <label class="mb-2 opacity-75">Icon</label>
                                <input autocomplete="off" required type="file" name="img" value="{{$category->icon}}" class="form-control rounded-1">
                                @error('img') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="mt-3">
                                <label class="mb-2 opacity-75">Nama</label>
                                <input autocomplete="off" required type="text" name="name" value="{{$category->name}}" class="form-control rounded-1">
                                @error('name') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="mt-5 mb-3 text-center">
                                <button class="btn btn-primary rounded-1 w-100 mb-3 border-0">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
