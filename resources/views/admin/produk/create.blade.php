@extends('layout.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="text-end mt-5">
                    <a href="/produk" class="btn btn-primary rounded-1 border-0">Back</a>
                </div>
                <div class="card mt-4">
                    <div class="card-body mx-4">
                        <form action="/produk" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3">
                                <label class="mb-2 opacity-75">Category</label>
                                <select required name="category_id" value="{{old('category_id')}}" class="form-select rounded-1">
                                    <option selected disabled>Select An Option</option>
                                    @foreach ($category as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="mt-3">
                                <label class="mb-2 opacity-75">Gambar</label>
                                <input autocomplete="off" required type="file" name="img" value="{{old('img')}}" class="form-control rounded-1">
                                @error('img') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="mt-3">
                                <label class="mb-2 opacity-75">Brand</label>
                                <select name="brand_id" value="{{old('brand_id')}}" class="form-select rounded-1">
                                    <option selected disabled>Select An Option</option>
                                    @foreach ($brand as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                                @error('brand_id') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="mt-3">
                                <label class="mb-2 opacity-75">Series</label>
                                <select name="series_id" value="{{old('series_id')}}" class="form-select rounded-1">
                                    <option selected disabled>Select An Option</option>
                                    @foreach ($series as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                                @error('series_id') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="mt-3">
                                <label class="mb-2 opacity-75">Character</label>
                                <select name="character_id" value="{{old('character_id')}}" class="form-select rounded-1">
                                    <option selected disabled>Select An Option</option>
                                    @foreach ($character as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                                @error('character_id') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="mt-3">
                                <label class="mb-2 opacity-75">Nama</label>
                                <input autocomplete="off" required type="text" name="name" value="{{old('name')}}" class="form-control rounded-1">
                                @error('name') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="mt-3">
                                <label class="mb-2 opacity-75">Harga</label>
                                <input autocomplete="off" required type="number" name="harga" value="{{old('harga')}}" class="form-control rounded-1">
                                @error('harga') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="mt-3">
                                <label class="mb-2 opacity-75">Stok</label>
                                <input autocomplete="off" required type="number" name="stok" value="{{old('stok')}}" class="form-control rounded-1">
                                @error('stok') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="mt-3">
                                <label class="mb-2 opacity-75">Berat</label>
                                <input autocomplete="off" required type="number" name="weight" value="{{old('weight')}}" class="form-control rounded-1">
                                @error('weight') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="mt-3">
                                <label class="mb-2 opacity-75">Deskripsi</label>
                                <textarea required name="deskripsi" class="form-control"> {{old('deskripsi')}}</textarea>
                                @error('deskripsi') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="mt-5 mb-3 text-center">
                                <button class="btn btn-primary rounded-1 w-100 mb-3 border-0">Buat</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
