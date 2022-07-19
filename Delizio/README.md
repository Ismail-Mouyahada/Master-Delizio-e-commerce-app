
<img src='https://github.com/Ismail-Mouyahada/Delizio-Original-Repo/blob/main/screencapture-127-0-0-1-8000-2022-07-19-11_28_31.png'/>


#Clone the content of '/Delizio' to your local machine
 
 - Make sure you have all the needed independancies of Laravel Framework. 
 
            - Nodejs
            - Composer
            - PHP > v7.4 - 8.00 <=
            - yarn or npm 

  
  Step 1: Open the project in your favourite IDE.
  
  Step 2: Open your terminal in the project root directory
  
  Step : launch the following commands :
  
          "" composer install ""
          "" npm install && npm run dev ""
          "" php artisan serve"" // check if everything is Ok
          "" php artisan migrate""
          "" php artisan db:seed""
          "" php artisan serve"" // if your local server went off.
  


            +--------+----------+---------------------------+------------------------------------+------------------------------------------------------------------------+---------------------------------------------+
            | Domain | Method   | URI                       | Name                               | Action                                                                 | Middleware     
                                         |
            +--------+----------+---------------------------+------------------------------------+------------------------------------------------------------------------+---------------------------------------------+
            |        | GET|HEAD | /                         | pageAccueil                        | App\Http\Controllers\AccueilController@index                           | web                                         |
            |        | GET|HEAD | accueil                   | accueil                            | App\Http\Controllers\HomeController@index                              | web                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\Authenticate            |
            |        | GET|HEAD | admin                     | admin.view                         | App\Http\Controllers\HomeController@adminView                          | web                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\IsAdmin                 |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\Authenticate            |
            |        | GET|HEAD | api/documentation         | l5-swagger.default.api             | L5Swagger\Http\Controllers\SwaggerController@api                       | L5Swagger\Http\Middleware\Config            |
            |        | GET|HEAD | api/oauth2-callback       | l5-swagger.default.oauth2_callback | L5Swagger\Http\Controllers\SwaggerController@oauth2Callback            | L5Swagger\Http\Middleware\Config            |
            |        | GET|HEAD | api/user                  |                                    | Closure                                                                | api                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\Authenticate:sanctum    |
            |        | POST     | api/v1/api-auth           |                                    | App\Http\Controllers\services\ApiController@login                      | api                                         |
            |        | GET|HEAD | api/v1/categories         |                                    | Closure                                                                | api                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\Authenticate:sanctum    |
            |        | POST     | api/v1/category/create    |                                    | Closure                                                                | api                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\Authenticate:sanctum    |
            |        | POST     | api/v1/recipe/create      |                                    | Closure                                                                | api                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\Authenticate:sanctum    |
            |        | DELETE   | api/v1/recipe/delete/{id} |                                    | Closure                                                                | api                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\Authenticate:sanctum    |
            |        | PUT      | api/v1/recipe/update/{id} |                                    | Closure                                                                | api            
                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\Authenticate:sanctum    |
            |        | GET|HEAD | api/v1/recipe/{id}        |                                    | Closure                                                                | api            
                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\Authenticate:sanctum    |
            |        | GET|HEAD | api/v1/recipes            |                                    | Closure                                                                | api            
                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\Authenticate:sanctum    |
            |        | POST     | api/v1/user/create        |                                    | Closure                                                                | api            
                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\Authenticate:sanctum    |
            |        | DELETE   | api/v1/user/delete/{id}   |                                    | Closure                                                                | api            
                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\Authenticate:sanctum    |
            |        | PUT      | api/v1/user/update/{id}   |                                    | Closure                                                                | api            
                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\Authenticate:sanctum    |
            |        | GET|HEAD | api/v1/user/{id}          |                                    | Closure                                                                | api            
                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\Authenticate:sanctum    |
            |        | GET|HEAD | api/v1/users              |                                    | Closure                                                                | api            
                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\Authenticate:sanctum    |
            |        | GET|HEAD | categorie/create          | categorie.create                   | App\Http\Controllers\CategorieController@create                        | web            
                                         |
            |        |          |                           |                                    |                                                                        | Auth           
                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\IsAdmin                 |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\Authenticate            |
            |        | GET|HEAD | categorie/delete/{id}     | categorie.destroy                  | App\Http\Controllers\CategorieController@destroy                       | web            
                                         |
            |        |          |                           |                                    |                                                                        | Auth           
                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\IsAdmin                 |
            |        | GET|HEAD | categorie/edit            | categorie.edit                     | App\Http\Controllers\CategorieController@edit                          | web            
                                         |
            |        |          |                           |                                    |                                                                        | Auth           
                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\IsAdmin                 |
            |        | GET|HEAD | categorie/index           | categorie.index                    | App\Http\Controllers\CategorieController@index                         | web            
                                         |
            |        |          |                           |                                    |                                                                        | Auth           
                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\IsAdmin                 |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\Authenticate            |
            |        | POST     | categorie/store           | categorie.store                    | App\Http\Controllers\CategorieController@store                         | web            
                                         |
            |        |          |                           |                                    |                                                                        | Auth           
                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\IsAdmin                 |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\Authenticate            |
            |        | GET|HEAD | categories/top/recettes   | recette.categories                 | App\Http\Controllers\RecetteController@categorie                       | web            
                                         |
            |        | POST     | comment/ajotuer/{id}      | comment.store                      | App\Http\Controllers\CommentController@store                           | web            
                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\Authenticate            |
            |        | GET|HEAD | contact                   | contacter                          | App\Http\Controllers\ContactController@index                           | web            
                                         |
            |        | GET|HEAD | docs/asset/{asset}        | l5-swagger.default.asset           | L5Swagger\Http\Controllers\SwaggerAssetController@index                | L5Swagger\Http\Middleware\Config            |
            |        | GET|HEAD | docs/{jsonFile?}          | l5-swagger.default.docs            | L5Swagger\Http\Controllers\SwaggerController@docs                      | L5Swagger\Http\Middleware\Config            |
            |        | POST     | like-recette/{id}         | like.recette                       | App\Http\Controllers\RecetteController@likeRecette                     | web            
                                         |
            |        | GET|HEAD | login                     | login                              | App\Http\Controllers\Auth\LoginController@showLoginForm                | web            
                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\RedirectIfAuthenticated |
            |        | POST     | login                     |                                    | App\Http\Controllers\Auth\LoginController@login                        | web            
                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\RedirectIfAuthenticated |
            |        | POST     | logout                    | logout                             | App\Http\Controllers\Auth\LoginController@logout                       | web            
                                         |
            |        | POST     | message/send              | message.create                     | App\Http\Controllers\MessageController@create                          | web            
                                         |
            |        | GET|HEAD | message/supprimer/{id}    | message.destory                    | App\Http\Controllers\MessageController@destroy                         | web            
                                         |
            |        | GET|HEAD | password/confirm          | password.confirm                   | App\Http\Controllers\Auth\ConfirmPasswordController@showConfirmForm    | web            
                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\Authenticate            |
            |        | POST     | password/confirm          |                                    | App\Http\Controllers\Auth\ConfirmPasswordController@confirm            | web            
                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\Authenticate            |
            |        | POST     | password/email            | password.email                     | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail  | web            
                                         |
            |        | POST     | password/reset            | password.update                    | App\Http\Controllers\Auth\ResetPasswordController@reset                | web            
                                         |
            |        | GET|HEAD | password/reset            | password.request                   | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web            
                                         |
            |        | GET|HEAD | password/reset/{token}    | password.reset                     | App\Http\Controllers\Auth\ResetPasswordController@showResetForm        | web            
                                         |
            |        | GET|HEAD | recette/creer             | creer                              | App\Http\Controllers\RecetteController@create                          | web            
                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\Authenticate            |
            |        | GET|HEAD | recette/details/{id}      | recipe.show                        | App\Http\Controllers\RecetteController@show                            | web            
                                         |
            |        | POST     | recette/enregistrer       | enregistrer                        | App\Http\Controllers\RecetteController@store                           | web            
                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\Authenticate            |
            |        | GET|HEAD | recette/export/{id}       | documents.recipe                   | App\Http\Controllers\DocumentController@exportPDF                      | web            
                                         |
            |        | GET|HEAD | recette/modifier/{id}     | modifier.{id}                      | App\Http\Controllers\RecetteController@edit                            | web            
                                         |
            |        | GET|HEAD | recette/show-pdf/{id}     | documents.show                     | App\Http\Controllers\DocumentController@showExport                     | web            
                                         |
            |        | GET|HEAD | recette/supprimer/{id}    | supprimer.{id}                     | App\Http\Controllers\RecetteController@destroy                         | web            
                                         |
            |        | PUT      | recette/update/{id}       | recette.update                     | App\Http\Controllers\RecetteController@update                          | web            
                                         |
            |        | GET|HEAD | recettes                  | liste                              | App\Http\Controllers\RecetteController@index                           | web            
                                         |
            |        | POST     | register                  |                                    | App\Http\Controllers\Auth\RegisterController@register                  | web            
                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\RedirectIfAuthenticated |
            |        | GET|HEAD | register                  | register                           | App\Http\Controllers\Auth\RegisterController@showRegistrationForm      | web            
                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\RedirectIfAuthenticated |
            |        | GET|HEAD | remerciement              | merci                              | App\Http\Controllers\MessageController@merci                           | web            
                                         |
            |        | GET|HEAD | sanctum/csrf-cookie       |                                    | Laravel\Sanctum\Http\Controllers\CsrfCookieController@show             | web            
                                         |
            |        | GET|HEAD | send/mail/{id}            | email.send                         | App\Http\Controllers\emails\EmailController@send                       | web            
                                         |
            |        | GET|HEAD | top/recettes              | filtrer                            | App\Http\Controllers\RecetteController@topRecettes                     | web            
                                         |
            |        | POST     | unlike-recette/{id}       | unlike.recette                     | App\Http\Controllers\RecetteController@unlikeRecette                   | web            
                                         |
            |        | GET|HEAD | user/delete/{id}          | user.destroy                       | App\Http\Controllers\AdminController@destroy                           | web            
                                         |
            |        | GET|HEAD | user/edit/{id}            | user.edit                          | App\Http\Controllers\AdminController@edit                              | web            
                                         |
            |        | GET|HEAD | user/profile              | profile.show                       | App\Http\Controllers\AdminController@showProfile                       | web            
                                         |
            |        |          |                           |                                    |                                                                        | App\Http\Middleware\Authenticate            |
            +--------+----------+---------------------------+------------------------------------+------------------------------------------------------------------------+---------------------------------------------+
