<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    
        public function list()
        {
           // Récupérer toutes les adresses depuis la base de données
    $addresses = Address::all();

    // Renvoyer les adresses en tant que réponse JSON
    return response()->json($addresses);
        }






    
        public function show($id)
        {
             // Récupérer l'adresse depuis la base de données en fonction de l'ID
             $address = Address::find($id);

             if ($address) {
                 return response()->json($address);
             } else {
                 return response()->json(['message' => 'Adresse non trouvée.'], 404);
             }
        }










    
        public function create(Request $request)
        {
            try {
                // Valider les données de la requête
                $request->validate([
                    'ville' => 'required',
                ]);
        
                // Créer une nouvelle adresse dans la base de données
                $address = Address::create($request->all());
        
                // Renvoyer les détails de la nouvelle adresse en tant que réponse JSON
                return response()->json($address, 201);
            } catch (ValidationException $e) {
                // La validation a échoué
                return response()->json(['error' => $e->errors()], 400);
            } catch (\Exception $e) {
                // Une autre exception s'est produite
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }










    
        public function update(Request $request, $id)
        {
               // Valider les données de la requête
    $request->validate([
        'ville' => 'required',
    ]);

    // Récupérer l'adresse depuis la base de données en fonction de l'ID
    $address = Address::findOrFail($id);

    // Mettre à jour les détails de l'adresse
    $address->update($request->all());
    

    // Renvoyer les détails de l'adresse mise à jour en tant que réponse JSON
    return response()->json($address);
        }
    
        public function delete($id)
        {
            // Récupérer l'adresse depuis la base de données en fonction de l'ID
    $address = Address::findOrFail($id);

    // Supprimer l'adresse
    $address->delete();

    

    // Renvoyer une réponse indiquant le succès de l'opération
    return response()->json(null, 204);
        }
    }
    

