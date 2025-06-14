<div class="bg-white p-4 rounded shadow">
    <h3 class="text-lg font-semibold mb-4">Commandes Rejeter</h3>

    <div class="space-y-4">
        <!-- Table à gauche -->
        <div class="table-auto w-full border border-gray-300 rounded-md shadow-sm overflow-x-auto">
            <table class="table-auto w-full text-sm">
                <thead>
                    <tr class="bg-gray-600 text-white text-left">
                        <th class="px-4 py-3 border-b">ID Commande</th>
                        <th class="px-4 py-3 border-b">Client</th>
                        <th class="px-4 py-3 border-b">Date Commande</th>
                        <th class="px-4 py-3 border-b">Date Livraison</th>
                        <th class="px-4 py-3 border-b">Nature</th>
                        <th class="px-4 py-3 border-b">État</th>
                        <th class="px-4 py-3 border-b">Quantité</th>
                        <th class="px-4 py-3 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cmd ?? [] as $carte)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-3 border-b">{{ $carte->id }}</td>
                            <td class="px-4 py-3 border-b">{{ $carte->clients->NomPrenom ?? Null}}</td>
                            <td class="px-4 py-3 border-b">{{ $carte->DateCommande }}</td>
                            <td class="px-4 py-3 border-b">{{ $carte->DateLivraison }}</td>
                            <td class="px-4 py-3 border-b">{{ $carte->NatureCarte }}</td>
                            <td class="px-4 py-3 border-b">
                                @if($carte->Etat == '1')
                                    <span class="bg-green-500 text-white px-2 py-1 rounded">Validé</span>
                                @elseif($carte->Etat == '2')
                                    <span class="bg-yellow-500 text-white px-2 py-1 rounded">Rejeter</span>
                                @else
                                    <span class="bg-gray-400 text-white px-2 py-1 rounded">{{ $carte->Etat }}</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 border-b">{{ $carte->Quantite }}</td>
                            <td class="px-4 py-3 border-b">
                                <div class="flex space-x-2">
                                    <button wire:click="showModalAnuller({{ $carte->id }})" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-3 rounded text-xs flex items-center space-x-2">
                                        <i class="fas fa-check"></i>
                                        <span>Annuler</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

</div>
