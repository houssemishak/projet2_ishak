<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <style>
        .product {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Produits Disponibles</h1>
    <div id="product-list">
    </div>

    <script>
        var products = [
            { id: 1, name: "Produit 1", price: 10.99, category: "Catégorie A" },
            { id: 2, name: "Produit 2", price: 15.49, category: "Catégorie B" },
            { id: 3, name: "Produit 3", price: 8.99, category: "Catégorie C" }
        ];

        // Fonction pour afficher les produits
        function displayProducts() {
            var productList = document.getElementById('product-list');
            
            products.forEach(function(product) {
                var productDiv = document.createElement('div');
                productDiv.className = 'product';
                productDiv.innerHTML = '<h2>' + product.name + '</h2>' +
                                        '<p>Prix: ' + product.price + ' €</p>' +
                                        '<p>Catégorie: ' + product.category + '</p>';
                productList.appendChild(productDiv);
            });
        }

        // Appeler la fonction pour afficher les produits
        displayProducts();
    </script>
</body>
</html>
