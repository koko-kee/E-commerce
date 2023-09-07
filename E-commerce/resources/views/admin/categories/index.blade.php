@extends('admin.layout.partials')

@section('title',"Listes des categories")

@section('content')

<div class="text-right mb-2">
    <button class="btn btn-primary">Ajouter une categorie</button>
</div>
<table class="table table-bordered border-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Nom du Produit</th>
            <th scope="col">Prix</th>
            <th scope="col">Quantité</th>
            <th scope="col">Description</th>
            <th scope="col">Sous-titre</th>
            <th scope="col">Slug</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td><img style="width: 50px;height:50px" src="data:image/jpeg;base64,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Fsj48fCaJtPYFag3+JSemR9q2XiMpZlYmonpi+czJXE1wO44hh15GelxTD7LDssRNzJOLZxV656/irazWVx/MkdoM+vjwftHwP0l5ROK+fHnhML4y+plIMaPvHuM8tizwQ9+UnKGquXxnXItTaL8JXGq54KPEzyVc6t4WElyWYs9as7e89u+RGK8Xv2ZzLRwe+bKrO3IAsfKbBs3obi6nu0twHi53fIXPlMba01kKOCE/iNpl3CNSFHJdfzTqOy/RUWsa1ZuxFA/3Ne/gJvWxOhGDw9ilBS4+2/tsD1Fr7vdaNDiew+h+LxNvUYZgp/zH9he3fbNv5QZ03oz6LKNIq+Kf17jPcAIpA9Y1fvsOqdHVbT1LpNsaIAAAAABYAZAAcAOEyREqEREBERAREQEREBERAREQEw16COLOqsOTAH5zNEDTdr+jrA17kUzSY/apm2fYcjNSx3ogfP1OKU8g6FT+ZSflOvRJqLtwev6LMepyFJxzD28mUTD/wBstof6afnE7/EaNuEUfRZjj73q1/mvLHD+iSt9uuo7APnczs0Ro25hhPRLSHv1Wbquf0Al5hPRxgk1phu0X/qJm5xGjaqwmwcPTFkpqo5AADwEn08Oq+6oHdM0So+T7EQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQP/9k=" alt="Produit 1" class="img-fluid"></td>
            <td>Produit 1</td>
            <td>$19.99</td>
            <td>50</td>
            <td>Description du Produit 1</td>
            <td>Sous-titre du Produit 1</td>
            <td>produit-1</td>
            <td>
                <button class="btn btn-primary btn-sm">Modifier</button>
                <button class="btn btn-danger btn-sm">Supprimer</button>
            </td>
        </tr>
        <tr>

            <th scope="row">2</th>
            <td><img src="product2.jpg" alt="Produit 2" class="img-fluid"></td>
            <td>Produit 2</td>
            <td>$29.99</td>
            <td>30</td>
            <td>Description du Produit 2</td>
            <td>Sous-titre du Produit 2</td>
            <td>produit-2</td>
            <td>
                <button class="btn btn-primary btn-sm">Modifier</button>
                <button class="btn btn-danger btn-sm">Supprimer</button>
            </td>
        </tr>
        <!-- Ajoutez d'autres lignes de produits ici -->
    </tbody>
</table>
@endsection