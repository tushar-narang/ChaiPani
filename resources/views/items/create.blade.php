@extends('matrix.app')

@section('content')
    @include('items.navigation')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Product') }}</div>

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('item.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                                <div class="col-md-6">

                                <select class="form-control {{ $errors->has('category') ? ' is-invalid' : '' }}" id="category" name="category">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach

                                </select>
                                    @if ($errors->has('category'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                                <div class="col-md-6">

                                    <textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" name="description" rows="3"></textarea>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>




                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" required>

                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="file-upload" class="col-md-4 col-form-label text-md-right">{{ __('Image Upload') }}</label>
                                <div class="col-md-6">
                                    <div class="custom-file">
                                        <input type="file" name="item_pic" class="custom-file-input" id="validatedCustomFile" required="">
                                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                    </div>
                                    @if ($errors->has('item_pic'))
                                        <span class="invalid-feedback {{ $errors->has('item_pic') ? ' is-invalid' : '' }}" role="alert">
                                        <strong>{{ $errors->first('item_pic') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Food Type') }}</label>
                                <div class="col-md-6">

                                    <select class="form-control {{ $errors->has('food_type') ? ' is-invalid' : '' }}" id="food_type" name="food_type">
                                        <option value="veg">Vegetarian</option>
                                        <option value="non-veg">Non - Vegetarian</option>
                                    </select>
                                    @if ($errors->has('food_type'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('food_type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add Product') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('custom_scripts')
    <script type="application/javascript">
        $(document).ready(function () {

            $('input[type="file"]').change(function(e){
                var fileName = e.target.files[0].name;
                $('.custom-file-label').html(fileName);
            });
        })
    </script>
@endsection
