
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
                    request()->routeIs('admin.product.create') ? 
                    route('admin.product.store') :
                    route('admin.product.update',["product" => $product->id]) 
                }}
            "
            method="POST" enctype="multipart/form-data">
                @csrf

                @include('shared.input', [

                    'class' => 'mb-4',
                    'label' => 'Nom du produit',
                    'message' => isset($message) ? $message : '', 
                    'name' => 'name', 
                    'type' => 'text',
                    'value' => $product->name
                ])

                @include('shared.input', [

                'class' => 'mb-4',
                'label' => 'description',
                'message' => isset($message) ? $message : '', 
                'name' => 'description', 
                'type' => 'textarea',
                'value' => $product->description

                ])


                @include('shared.input', [

                'class' => 'mb-4',
                'label' => 'sous-description',
                'message' => isset($message) ? $message : '', 
                'name' => 'subtitle', 
                'type' => 'textarea',
                'value' => $product->subtitle
                ])

                                
                @include('shared.input', [

                'class' => 'mb-4',
                'label' => 'prix',
                'message' => isset($message) ? $message : '', 
                'name' => 'price', 
                'type' => 'number',
                'value' => $product->price
                ])

                @include('shared.input', [

                'class' => 'mb-4',
                'label' => 'quantite',
                'message' => isset($message) ? $message : '', 
                'name' => 'quantity', 
                'type' => 'number',
                'value' => $product->quantity

                ])

                
                @include('shared.selected', [

                'class' => 'mb-4',
                'label' => 'categories',
                'message' => isset($message) ? $message : '', 
                'name' => 'categories[]', 
                'array' => $categories,
                'value' => $product->categories
                ])

                @include('shared.input', [

                'class' => 'mb-4',
                'label' => 'image',
                'message' => isset($message) ? $message : '', 
                'name' => 'image', 
                'type' => 'file'

                ])
        
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Enregistrer</button>
                </div>
            </form>
        </div>
        
    </div>
    
</x-app-layout>







    