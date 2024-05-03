<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">Secure file storage application</h2>
                
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @foreach ($files as $file)

                        <a href="{{ $file->filename }}">{{ $file->filename }}</a>
                        
                    @endforeach
                  
                   <form method="POST" action="/your-upload-route" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="my_file">
                        <x-primary-button>{{ __('Upload') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
