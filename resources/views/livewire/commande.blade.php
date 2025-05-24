<div class="bg-white p-4 rounded shadow">
    <h3 class="text-lg font-semibold mb-4">Gestion des Commandes</h3>

    <!-- Notifications -->
    <x:notify-messages />

    @if($isModalOpen)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white w-full max-w-2xl p-6 rounded shadow-xl overflow-y-auto max-h-screen">
                <h2 class="text-xl font-semibold mb-4">Ajouter une nouvelle Commandes</h2>

                <form wire:submit.prevent="store">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                        <div>
                            <label class="block text-sm">Date Commande</label>
                            <input type="date" wire:model.defer="DateCommande" class="w-full border rounded px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm">Date Livraison</label>
                            <input type="date" wire:model.defer="DateLivraison" class="w-full border rounded px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm">Type Carte</label>
                            <input type="text" wire:model.defer="TypeCartes" class="w-full border rounded px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm">Service Commande</label>
                            <input type="text" wire:model.defer="ServiceCommande" class="w-full border rounded px-3 py-2">
                        </div>

                        <div>
                            <label for="natureCarte" class="block text-gray-700">Nature Carte</label>
                            <select id="natureCarte" wire:model.defer="NatureCarte"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Sélectionner</option>
                                <option value="Physique">✅Physique</option>
                                <option value="Numerique">✅Numerique</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm">Pays</label>
                            <input type="text" wire:model.defer="PaysCommande" class="w-full border rounded px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm">Ville</label>
                            <input type="text" wire:model.defer="VilleCommande" class="w-full border rounded px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm">État</label>
                            <select wire:model.defer="Etat" class="w-full border rounded px-3 py-2">
                                <option value="">-- Choisir --</option>
                                <option value="0">En attente</option>
                                <option value="1">Livré</option>
                                <option value="2">Annulé</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm">Email</label>
                            <input type="email" wire:model.defer="Mail" class="w-full border rounded px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm">Téléphone</label>
                            <input type="text" wire:model.defer="Telephone" class="w-full border rounded px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm">Quantité</label>
                            <input type="number" wire:model.defer="Quantite" class="w-full border rounded px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm">Caractéristique</label>
                            <select wire:model.defer="Caracteristique" multiple class="w-full border rounded px-3 py-2 h-32">
                                <option value="politique">@lang('Carte politique')</option>
                                <option value="physique">@lang('Carte physique')</option>
                                <option value="administrative">@lang('Carte Administrative')</option>
                                <option value="climatique">@lang('carte climatique')</option>
                                <option value="demographique">@lang('Carte demographique')</option>
                                <option value="economique">@lang('Carte economique')</option>
                                <option value="agricole">@lang('Carte agricole')</option>
                                <option value="touristique">@lang('Carte touristique')</option>
                                <option value="ressources naturelles">@lang('Carte des ressources naturelles')</option>
                                <option value="routière">@lang('Carte routière')</option>
                                <option value="ferroviaire">@lang('Carte ferroviaire')</option>
                                <option value="aeronautique">@lang('Carte aeronautique')</option>
                                <option value="topographique">@lang('Carte topographique')</option>
                                <option value="geologique">@lang('Carte geologique')</option>
                                <option value="hydrologique">@lang('Carte hydrologique')</option>
                                <option value="militaire">@lang('Carte militaire')</option>
                                <option value="securite">@lang('Carte de securite')</option>
                            </select>
                            <p class="text-xs text-gray-500 mt-1">Maintenez Ctrl (Windows) ou Cmd (Mac) pour sélectionner plusieurs utilisateurs.</p>
                        </div>

                    </div>

                    <div class="mt-6 flex justify-end space-x-2">
                        <button type="button" wire:click="closeModal" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Annuler</button>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    @if($showConfirmationModal)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded shadow-md">
                <h3 class="text-lg font-semibold">Confirmer la suppression</h3>
                <p>Êtes-vous sûr de vouloir supprimer cette commande ?</p>
                <div class="mt-4 flex justify-end space-x-4">
                    <button wire:click="$set('showConfirmationModal', false)" class="bg-gray-300 text-gray-800 px-4 py-2 rounded">Annuler</button>
                    <button wire:click="delete" class="bg-red-500 text-white px-4 py-2 rounded">Confirmer</button>
                </div>
            </div>
        </div>
    @endif

    @if($showDetail)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-2xl shadow-xl p-6 w-full max-w-2xl">
                <h3 class="text-2xl font-bold text-gray-800 mb-4 border-b pb-2">Détails de la commande</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-gray-700">
                    <div>
                        <p class="font-semibold">Nature Carte :</p>
                        <p>{{ $selectedCmd->NatureCarte ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <p class="font-semibold">Date Commande :</p>
                        <p>{{ $selectedCmd->DateCommande ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <p class="font-semibold">Date Livraison :</p>
                        <p>{{ $selectedCmd->DateLivraison ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <p class="font-semibold">Pays :</p>
                        <p>{{ $selectedCmd->PaysCommande ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <p class="font-semibold">Ville :</p>
                        <p>{{ $selectedCmd->VilleCommande ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <p class="font-semibold">Téléphone :</p>
                        <p>{{ $selectedCmd->Telephone ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <p class="font-semibold">Quantité :</p>
                        <p>{{ $selectedCmd->Quantite ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <p class="font-semibold">Etat :</p>
                        @if($selectedCmd->Etat == '1')
                            <span class="bg-green-500 text-white px-2 py-1 rounded">Livré</span>
                        @elseif($selectedCmd->Etat == '0')
                            <span class="bg-yellow-500 text-white px-2 py-1 rounded">attente</span>
                        @else
                            <span class="bg-gray-400 text-white px-2 py-1 rounded">Rejeter</span>
                        @endif
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button wire:click="$set('showDetail', false)"
                        class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg shadow-sm">
                        Fermer
                    </button>
                </div>
            </div>
        </div>

    @endif

    <div class="space-y-4">
        <!-- Table à gauche -->
        <div class="table-auto w-full border border-gray-300 rounded-md shadow-sm overflow-x-auto">
            <table class="table-auto w-full text-sm">
                <thead>
                    <tr class="bg-gray-600 text-white text-left">
                        <th class="px-4 py-3 border-b">Date Commande</th>
                        <th class="px-4 py-3 border-b">Date Livraison</th>
                        <th class="px-4 py-3 border-b">Nature</th>
                        <th class="px-4 py-3 border-b">Pays</th>
                        <th class="px-4 py-3 border-b">Ville</th>
                        <th class="px-4 py-3 border-b">État</th>
                        <th class="px-4 py-3 border-b">Email</th>
                        <th class="px-4 py-3 border-b">Téléphone</th>
                        <th class="px-4 py-3 border-b">Quantité</th>
                        <th class="px-4 py-3 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cmd ?? [] as $carte)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-3 border-b">{{ $carte->DateCommande }}</td>
                            <td class="px-4 py-3 border-b">{{ $carte->DateLivraison }}</td>
                            <td class="px-4 py-3 border-b">{{ $carte->NatureCarte }}</td>
                            <td class="px-4 py-3 border-b">{{ $carte->PaysCommande }}</td>
                            <td class="px-4 py-3 border-b">{{ $carte->VilleCommande }}</td>
                            <td class="px-4 py-3 border-b">
                                @if($carte->Etat == '1')
                                    <span class="bg-green-500 text-white px-2 py-1 rounded">Livré</span>
                                @elseif($carte->Etat == '0')
                                    <span class="bg-yellow-500 text-white px-2 py-1 rounded">attente</span>
                                @else
                                    <span class="bg-gray-400 text-white px-2 py-1 rounded">Rejeter</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 border-b">{{ $carte->Mail }}</td>
                            <td class="px-4 py-3 border-b">{{ $carte->Telephone }}</td>
                            <td class="px-4 py-3 border-b">{{ $carte->Quantite }}</td>
                            <td class="px-4 py-3 border-b space-y-2">
                                <!-- Bouton Supprimer -->
                                <button wire:click="confirmDelete({{ $carte->id }})"
                                    class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-3 rounded text-sm flex items-center justify-center space-x-2">
                                    <i class="fas fa-trash-alt"></i>
                                    <span>Supprimer</span>
                                </button>

                                <!-- Bouton Détails -->
                                <button wire:click="details({{ $carte->id }})"
                                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-3 rounded text-sm flex items-center justify-center space-x-2">
                                    <i class="fas fa-eye"></i>
                                    <span>Détails</span>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    <!-- Bouton Ajouter -->
    <div class="mt-4">
        <button wire:click="showModal" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center space-x-2">
            <i class="fas fa-plus"></i>
            <span>Ajouter une carte</span>
        </button>
    </div>

</div>
