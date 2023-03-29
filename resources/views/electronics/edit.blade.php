@extends('layouts.app')

@section('title', 'Create')

@section('content')

    <form action="{{ route('electronics.update', $electronic->id) }}" role="form" method="POST"
        enctype="multipart/form-data" class="flex flex-col justify-center items-center my-3">
        <!-- Add CSRF Token -->
        {{ method_field('PATCH') }}
        @csrf
        <div class="bg-base-content/10 rounded-xl p-4">
            <div class="rounded-xl gap-3 px-2 text-primary flex flex-col justify-center items-center">
                <label class="">Nombre del Producto</label>
                <input type="text" placeholder="Product Name" name="name"
                    class="bg-neutral text-white p-2 rounded placeholder-white w-full" value="{{ $electronic->name }}"
                    required />

                <label class="">Descripcion</label>
                <textarea type="text" placeholder="Product Description" name="description"
                    class="bg-neutral text-white p-2 rounded placeholder-white w-full" value="{{ $electronic->description }}" required></textarea>

                <div class="flex text-center gap-2 my-3 items-center justify-center">
                    <label class="">Precio</label>
                    <input type="number" step="0.01" placeholder="Price" name="price"
                        class="bg-neutral text-white p-2 rounded placeholder-white w-full" value="{{ $electronic->price }}"
                        required />

                    <label class="">Stock</label>
                    <input type="number" step="1" placeholder="Stock" name="stock"
                        class="bg-neutral text-white p-2 rounded placeholder-white w-full" value="{{ $electronic->stock }}"
                        required />
                </div>


                <div class="flex text-center gap-2 my-3 items-center justify-center w-full">
                    <label class="">Categoria</label>
                    <select name="category" class="bg-neutral text-white p-2 rounded placeholder-white w-full">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>

                    <label class="">Marca</label>
                    <select name="brand" class="bg-neutral text-white p-2 rounded placeholder-white w-full">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="flex flex-wrap justify-around items-center gap-10">
                    <div class="flex">
                        <label class="mx-1">Descuento (*)</label>
                        <select name="offers" class="bg-neutral text-white p-1 rounded placeholder-white w-full">
                            <option value="1">Si</option>
                            <option value="0" default selected>No</option>
                        </select>
                    </div>

                    <div class="flex flex-col items-center justify-center gap-2">
                        <input type="file" name="file" required class="rounded flex flex-col">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <div class="text-xs">*las ofertas seran agregadas sobre el precio que se ha ingresado (10%) descuento</div>
    </form>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>


@endsection
