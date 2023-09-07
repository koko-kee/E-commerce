
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12 m-10">
        <div class="w-50 mx-auto bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">@yield('title')</h2>
            
            <form action="
                {{ 
                    request()->routeIs('admin.category.create') ? 
                    route('admin.category.store') :
                    route('admin.category.update',["id" => $category->id]) 
                }}
            "
            method="POST" enctype="multipart/form-data">
                @csrf

                @include('shared.input', [

                    'class' => 'mb-4',
                    'label' => 'Nom categorie',
                    'message' => isset($message) ? $message : '', 
                    'name' => 'name', 
                    'type' => 'text',
                    'value' => $category->name
                ])

                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Enregistrer</button>
                </div>
            </form>
        </div>
        
    </div>
    
</x-app-layout>







    