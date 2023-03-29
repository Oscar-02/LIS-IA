@extends('layouts.app')

@section('title', 'Show')

@section('content')

    <div class="bg-black/10 rounded drop-shadow-2xl mt-5">
        <div class="p-5">
            <div class="flex justify-center">
                <img src={{ url('storage/electronic/' . $electronic->file_path) }} alt=""
                    class="rounded w-1/3 object-cover">
            </div>
            <div class="text-md font-bold mt-2 text-2xl">
                <div>
                    {{ $electronic->name }}
                </div>
            </div>
            <div class="text-md">
                {{ $electronic->description }}
            </div>
            <div class="flex justify-between items-center mt-2">
                <div class=" border border-dashed rounded p-1 text-xl">Solamente <span
                        class="font-bold text-primary">{{ $electronic->stock }} </span>en stock</div>
                @if ($electronic->has_offers)
                    <div class="text-warning font-bold text-xl">${{ $electronic->price * 0.9 }} <span
                            class="line-through text-sm text-primary">${{ $electronic->price }}</span></div>
                @else
                    <div class="text-warning font-bold text-xl">${{ $electronic->price }}</div>
                @endif
            </div>
        </div>

    @endsection
