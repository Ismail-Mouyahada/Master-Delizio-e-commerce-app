## Master-Delizio-e-commerce-app 


<img src='https://github.com/Ismail-Mouyahada/Delizio-Original-Repo/blob/main/screencapture-127-0-0-1-8000-2022-07-19-11_28_31.png'/>

Creating a mobile e-commerce app with Dart (using Flutter for the frontend) and Laravel for the backend API involves several steps. Here's a detailed guide to help you get started.

### High-Level Plan

1. **Setup Laravel for Backend API**
2. **Develop Backend API Endpoints**
3. **Setup Flutter for Mobile App Development**
4. **Integrate Laravel API with Flutter**
5. **Design and Implement the Mobile Interface**

### Step-by-Step Instructions

#### 1. Setup Laravel for Backend API

1. **Install Laravel**
   - Follow the installation instructions for [Laravel](https://laravel.com/docs/10.x/installation).

2. **Create a New Laravel Project**
   ```sh
   composer create-project --prefer-dist laravel/laravel delizio-backend
   cd delizio-backend
   ```

3. **Setup Database Configuration**
   - Update the `.env` file with your database credentials.
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=delizio
   DB_USERNAME=root
   DB_PASSWORD=secret
   ```

4. **Run Migrations**
   ```sh
   php artisan migrate
   ```

#### 2. Develop Backend API Endpoints

1. **Create Models and Migrations**
   ```sh
   php artisan make:model Product -m
   php artisan make:model Order -m
   php artisan make:model User -m
   ```

2. **Define Database Schema**
   - Edit the migration files in `database/migrations`.

   Example for `create_products_table.php`:
   ```php
   public function up()
   {
       Schema::create('products', function (Blueprint $table) {
           $table->id();
           $table->string('name');
           $table->text('description');
           $table->decimal('price', 8, 2);
           $table->integer('stock');
           $table->timestamps();
       });
   }
   ```

3. **Run Migrations**
   ```sh
   php artisan migrate
   ```

4. **Create API Controllers**
   ```sh
   php artisan make:controller API/ProductController
   php artisan make:controller API/OrderController
   php artisan make:controller API/UserController
   ```

5. **Define Routes**
   - Edit `routes/api.php`.
   ```php
   use App\Http\Controllers\API\ProductController;
   use App\Http\Controllers\API\OrderController;
   use App\Http\Controllers\API\UserController;

   Route::middleware('auth:sanctum')->group(function () {
       Route::get('/products', [ProductController::class, 'index']);
       Route::get('/products/{id}', [ProductController::class, 'show']);
       Route::post('/orders', [OrderController::class, 'store']);
       Route::get('/orders/{id}', [OrderController::class, 'show']);
   });

   Route::post('/register', [UserController::class, 'register']);
   Route::post('/login', [UserController::class, 'login']);
   ```

6. **Implement Controller Methods**
   - Example for `ProductController.php`:
   ```php
   namespace App\Http\Controllers\API;

   use App\Http\Controllers\Controller;
   use App\Models\Product;
   use Illuminate\Http\Request;

   class ProductController extends Controller
   {
       public function index()
       {
           return Product::all();
       }

       public function show($id)
       {
           return Product::findOrFail($id);
       }
   }
   ```

#### 3. Setup Flutter for Mobile App Development

1. **Install Flutter**
   - Follow the installation instructions for [Flutter](https://flutter.dev/docs/get-started/install).

2. **Create a New Flutter Project**
   ```sh
   flutter create delizio_app
   cd delizio_app
   ```

3. **Add Dependencies**
   - Update `pubspec.yaml` to include necessary packages.
   ```yaml
   dependencies:
     flutter:
       sdk: flutter
     http: ^0.13.3
     provider: ^5.0.0
   ```

4. **Setup Project Structure**
   - Create folders for models, providers, and screens.

#### 4. Integrate Laravel API with Flutter

1. **Create Models**
   - Example for `product.dart`:
   ```dart
   class Product {
     final int id;
     final String name;
     final String description;
     final double price;
     final int stock;

     Product({required this.id, required this.name, required this.description, required this.price, required this.stock});

     factory Product.fromJson(Map<String, dynamic> json) {
       return Product(
         id: json['id'],
         name: json['name'],
         description: json['description'],
         price: json['price'],
         stock: json['stock'],
       );
     }
   }
   ```

2. **Create Providers**
   - Example for `product_provider.dart`:
   ```dart
   import 'package:flutter/material.dart';
   import 'package:http/http.dart' as http;
   import 'dart:convert';

   import '../models/product.dart';

   class ProductProvider with ChangeNotifier {
     List<Product> _products = [];

     List<Product> get products => _products;

     Future<void> fetchProducts() async {
       final response = await http.get(Uri.parse('http://localhost:8000/api/products'));

       if (response.statusCode == 200) {
         List jsonResponse = json.decode(response.body);
         _products = jsonResponse.map((product) => Product.fromJson(product)).toList();
         notifyListeners();
       } else {
         throw Exception('Failed to load products');
       }
     }
   }
   ```

3. **Create Screens**
   - Example for `product_list_screen.dart`:
   ```dart
   import 'package:flutter/material.dart';
   import 'package:provider/provider.dart';

   import '../providers/product_provider.dart';

   class ProductListScreen extends StatelessWidget {
     @override
     Widget build(BuildContext context) {
       return Scaffold(
         appBar: AppBar(
           title: Text('Products'),
         ),
         body: FutureBuilder(
           future: Provider.of<ProductProvider>(context, listen: false).fetchProducts(),
           builder: (ctx, snapshot) => snapshot.connectionState == ConnectionState.waiting
               ? Center(child: CircularProgressIndicator())
               : Consumer<ProductProvider>(
                   builder: (ctx, productProvider, _) => ListView.builder(
                     itemCount: productProvider.products.length,
                     itemBuilder: (ctx, i) => ListTile(
                       title: Text(productProvider.products[i].name),
                       subtitle: Text('\$${productProvider.products[i].price}'),
                     ),
                   ),
                 ),
         ),
       );
     }
   }
   ```

4. **Add Routes**
   - Update `main.dart`:
   ```dart
   import 'package:flutter/material.dart';
   import 'package:provider/provider.dart';

   import './screens/product_list_screen.dart';
   import './providers/product_provider.dart';

   void main() {
     runApp(MyApp());
   }

   class MyApp extends StatelessWidget {
     @override
     Widget build(BuildContext context) {
       return MultiProvider(
         providers: [
           ChangeNotifierProvider(create: (_) => ProductProvider()),
         ],
         child: MaterialApp(
           title: 'Delizio',
           theme: ThemeData(
             primarySwatch: Colors.blue,
           ),
           home: ProductListScreen(),
         ),
       );
     }
   }
   ```

#### 5. Design and Implement the Mobile Interface

1. **Improve UI/UX**
   - Add more detailed product views, shopping cart functionality, user authentication, and order management.
   - Utilize Flutter's widgets to create a clean and user-friendly interface.

2. **Testing**
   - Test the app thoroughly on different devices and screen sizes.
   - Ensure the Laravel API works seamlessly with the Flutter app.

### Final Steps

1. **Run Laravel Server**
   ```sh
   php artisan serve
   ```

2. **Run Flutter App**
   ```sh
   flutter run
   ```

Now you have a basic e-commerce mobile app with a Flutter frontend and a Laravel backend. Expand the app by adding more features, refining the UI, and ensuring a seamless user experience.
