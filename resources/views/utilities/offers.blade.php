<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 my-3 gap-3 bg-grey">
    @foreach ($electronics as $electronic)
        @if ($electronic->has_offers)
            <div class="bg-black/10 rounded drop-shadow-2xl">
                <div class="p-5">
                    <div class="flex justify-center">
                        <img src={{ url('storage/electronic/' . $electronic->file_path) }} alt=""
                            class="rounded w-16 object-cover">
                    </div>
                    <div class="text-md font-bold mt-2 text-lg">
                        <div>
                            {{ $electronic->name }}
                        </div>
                    </div>
                    <div class="text-sm">
                        {{ $electronic->description }}
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <div class="text-sm border border-dashed rounded p-1">Only <span
                                class="font-bold text-primary">{{ $electronic->stock }} </span>in stock!</div>
                        <div class="text-warning font-bold">${{ $electronic->price * 0.9 }} <span
                                class="line-through text-xs text-primary">${{ $electronic->price }}</span></div>
                    </div>
                </div>
                <form action="{{ route('categories.destroy', $electronic->id) }}" method="POST"
                    class="grid grid-cols-2 text-white text-center gap-4 mx-5 mb-5 font-bold">
                    <a href="{{ route('electronics.show', $electronic->id) }}"
                        class="btn btn-primary rounded p-2">show</a>
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger rounded p-2" type="submit">del</button>
                </form>
            </div>
        @endif
    @endforeach
</div>
