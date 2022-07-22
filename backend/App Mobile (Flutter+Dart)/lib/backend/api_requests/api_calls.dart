import '../../composants/composant_util.dart';

import 'api_manager.dart';

export 'api_manager.dart' show ApiCallResponse;

class FetchCall {
  static Future<ApiCallResponse> call() {
    return ApiManager.instance.makeApiCall(
      callName: 'fetch',
      apiUrl: 'https://4162-37-171-20-25.eu.ngrok.io/api/v1/recipes',
      callType: ApiCallType.GET,
      headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer 5|jwwqjl0bk3KZsks2z4AtpYJ0ZTnB43bGJHhlHL9j',
      },
      params: {},
      returnBody: true,
    );
  }
}

class DeleteRecipeCall {
  static Future<ApiCallResponse> call() {
    return ApiManager.instance.makeApiCall(
      callName: 'Delete recipe',
      apiUrl: 'https://4162-37-171-20-25.eu.ngrok.io/api/v1/recipe/delete/1',
      callType: ApiCallType.DELETE,
      headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer 5|jwwqjl0bk3KZsks2z4AtpYJ0ZTnB43bGJHhlHL9j',
      },
      params: {},
      returnBody: true,
    );
  }
}

class FetchOneRecipeCall {
  static Future<ApiCallResponse> call() {
    return ApiManager.instance.makeApiCall(
      callName: 'fetch one recipe',
      apiUrl: 'https://4162-37-171-20-25.eu.ngrok.io/api/v1/recipe/11',
      callType: ApiCallType.GET,
      headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer 5|jwwqjl0bk3KZsks2z4AtpYJ0ZTnB43bGJHhlHL9j',
      },
      params: {},
      returnBody: true,
    );
  }
}

class CreateRecipeCopyCall {
  static Future<ApiCallResponse> call({
    String? mainImage = '',
    String? title = '',
    int? categorie,
    String? summary = '',
    String? tag = '',
    String? description = '',
    int? tempsCuisson,
    int? tempsPreparation,
    int? tempsRepos,
    int? calories,
    int? gras,
    int? cholesterole,
    int? carbohydrates,
    int? proteines,
    int? budget,
    int? difficulte,
    String? video = '',
    int? userId,
    int? ingredientId,
  }) {
    final body = '''
{
  "main_image": "${mainImage}",
  "title": "${title}",
  "categorie": ${categorie},
  "summary": "${summary}",
  "tag": "${tag}",
  "description": "${description}",
  "temps_cuisson": ${tempsCuisson},
  "temps_preparation": ${tempsPreparation},
  "temps_repos": ${tempsRepos},
  "calories": ${calories},
  "gras": ${gras},
  "cholesterole": ${cholesterole},
  "carbohydrates": ${carbohydrates},
  "proteines": ${proteines},
  "budget": ${budget},
  "difficulte": ${difficulte},
  "video": "${video}",
  "user_id": ${userId},
  "ingredient_id": ${ingredientId}
}''';
    return ApiManager.instance.makeApiCall(
      callName: 'Create recipe Copy',
      apiUrl: 'https://4162-37-171-20-25.eu.ngrok.io/api/v1/recipe/create',
      callType: ApiCallType.POST,
      headers: {
        'Authorization': 'Bearer 5|jwwqjl0bk3KZsks2z4AtpYJ0ZTnB43bGJHhlHL9j',
        'content-Type': 'application/json',
      },
      params: {
        'main_image': mainImage,
        'title': title,
        'categorie': categorie,
        'summary': summary,
        'tag': tag,
        'description': description,
        'temps_cuisson': tempsCuisson,
        'temps_preparation': tempsPreparation,
        'temps_repos': tempsRepos,
        'calories': calories,
        'gras': gras,
        'cholesterole': cholesterole,
        'carbohydrates': carbohydrates,
        'proteines': proteines,
        'budget': budget,
        'difficulte': difficulte,
        'video': video,
        'user_id': userId,
        'ingredient_id': ingredientId,
      },
      body: body,
      bodyType: BodyType.JSON,
      returnBody: true,
    );
  }
}

class UpdateRecipeCall {
  static Future<ApiCallResponse> call({
    String? mainImage = '',
    String? title = '',
    int? categorie,
    String? summary = '',
    String? tag = '',
    String? description = '',
    int? tempsCuisson,
    int? tempsPreparation,
    int? tempsRepos,
    int? calories,
    int? gras,
    int? cholesterole,
    int? carbohydrates,
    int? proteines,
    int? budget,
    int? difficulte,
    String? video = '',
    int? userId,
    int? ingredientId,
  }) {
    final body = '''
{
  "main_image": "${mainImage}",
  "title": "${title}",
  "categorie": ${categorie},
  "summary": "${summary}",
  "tag": "${tag}",
  "description": "${description}",
  "temps_cuisson": ${tempsCuisson},
  "temps_preparation": ${tempsPreparation},
  "temps_repos": ${tempsRepos},
  "calories": ${calories},
  "gras": ${gras},
  "cholesterole": ${cholesterole},
  "carbohydrates": ${carbohydrates},
  "proteines": ${proteines},
  "budget": ${budget},
  "difficulte": ${difficulte},
  "video": "${video}",
  "user_id": ${userId},
  "ingredient_id": ${ingredientId}
}''';
    return ApiManager.instance.makeApiCall(
      callName: ' Update recipe',
      apiUrl: 'https://4162-37-171-20-25.eu.ngrok.io/api/v1/recipe/update/2',
      callType: ApiCallType.PUT,
      headers: {
        'Authorization': 'Bearer 5|jwwqjl0bk3KZsks2z4AtpYJ0ZTnB43bGJHhlHL9j',
        'content-Type': 'application/json',
      },
      params: {
        'main_image': mainImage,
        'title': title,
        'categorie': categorie,
        'summary': summary,
        'tag': tag,
        'description': description,
        'temps_cuisson': tempsCuisson,
        'temps_preparation': tempsPreparation,
        'temps_repos': tempsRepos,
        'calories': calories,
        'gras': gras,
        'cholesterole': cholesterole,
        'carbohydrates': carbohydrates,
        'proteines': proteines,
        'budget': budget,
        'difficulte': difficulte,
        'video': video,
        'user_id': userId,
        'ingredient_id': ingredientId,
      },
      body: body,
      bodyType: BodyType.JSON,
      returnBody: true,
    );
  }
}
