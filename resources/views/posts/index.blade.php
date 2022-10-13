@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg mb-4">
           @auth
                <form action="{{ route('posts') }}" method="post" class="mb-4">
                    @csrf
                    <div class="mb-4">
                        <laber for="body" class="sr-only">Body</laber>
                        <textarea name="body" id="body" cols="30" rows="04" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post something!"></textarea>

                        @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded font-medium">Post</button>
                    </div>
                </form>
           @endauth 

            @if ($posts->count())
                @foreach ($posts as $post)
                   <x-post :post="$post" />
                @endforeach
            <!-- Pagenation -->
            {{ $posts->links() }}
            @else
                <p>There is no post yet!</p>
            @endif
        </div>
    </div>
@endsection