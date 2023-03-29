@extends('layouts.app')

@section('title', 'Create')

@section('content')

    <div class="flex justify-center gap-10">
        <div class="dropdown">
            <label tabindex="0" class="btn m-1">Nueva marca</label>
            <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52 text-center">
                <li><label for="my-modal" class="btn">+ Añadir</label></li>
                @foreach ($brands as $brand)
                    <li>
                        <a id="{{ $brand->brand }}">
                            {{ $brand->brand }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div>
            <input type="checkbox" id="my-modal" class="modal-toggle" />
            <label for="my-modal" class="modal cursor-pointer">
                <label class="modal-box relative" for="">
                    <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data"
                        class="flex justify-center items-center my-3 flex-col">
                        @csrf

                        @include('electronics.brands')
                    </form>
                </label>
            </label>
        </div>

        <div class="dropdown">
            <label tabindex="0" class="btn m-1">Nueva Categoria</label>
            <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52 text-center">
                <li><label for="my-modal-5" class="btn">+ Añadir</label></li>
                @foreach ($categories as $category)
                    <li>
                        <a id="{{ $category->id }}">
                            {{ $category->category }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div>
            <input type="checkbox" id="my-modal-5" class="modal-toggle" />
            <label for="my-modal-5" class="modal cursor-pointer">
                <label class="modal-box relative" for="">
                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data"
                        class="flex justify-center items-center my-3 flex-col">
                        @csrf

                        @include('electronics.form')
                    </form>
                </label>
            </label>
        </div>
    </div>

    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data"
        class="flex flex-col justify-center items-center my-3">
        <!-- Add CSRF Token -->
        @csrf
        <div class="bg-base-content/10 rounded-xl p-4">
            <div class="rounded-xl gap-2 px-2 text-primary flex flex-col justify-center items-center">
                <label class="">Nombre del Producto</label>
                <input type="text" placeholder="Product Name" name="name"
                    class="bg-neutral text-white p-2 rounded placeholder-white w-full" required />

                <label class="">Descripcion</label>
                <textarea type="text" placeholder="Product Description" name="description"
                    class="bg-neutral text-white p-2 rounded placeholder-white w-full" required></textarea>

                <div class="flex text-center gap-2 my-3 items-center justify-center">
                    <label class="">Precio</label>
                    <input type="number" step="0.01" placeholder="Price" name="price"
                        class="bg-neutral text-white p-2 rounded placeholder-white w-full" required />

                    <label class="">Stock</label>
                    <input type="number" step="1" placeholder="Stock" name="stock"
                        class="bg-neutral text-white p-2 rounded placeholder-white w-full" />
                </div>


                <div class="flex text-center gap-2 my-3 items-center justify-center w-full">
                    <label class="">Categoria</label>
                    <select name="category" id=""
                        class="bg-neutral text-white p-2 rounded placeholder-white w-full">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>

                    <label class="">Marca</label>
                    <select name="brand" id=""
                        class="bg-neutral text-white p-2 rounded placeholder-white w-full">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="flex flex-wrap justify-around items-center gap-10">
                    <div class="flex">
                        <label class="mx-1">Descuento (*)</label>
                        <select name="offers" id=""
                            class="bg-neutral text-white p-1 rounded placeholder-white w-full">
                            <option value="1">Si</option>
                            <option value="0" default selected>No</option>
                        </select>
                    </div>

                    <div class="flex flex-col items-center justify-center gap-2">
                        <input type="file" name="file" required class="rounded flex flex-col">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
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
