<div class="bg-white p-4 rounded shadow">
    <h3 class="text-lg font-semibold mb-4">Gestion des Clients</h3>

    <!-- Notifications -->
    <x:notify-messages />

    @if($isModalOpenClient)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white w-full max-w-2xl p-6 rounded shadow-xl overflow-y-auto max-h-screen">
                <h2 class="text-xl font-semibold mb-4">Ajouter un client</h2>

                <form wire:submit.prevent="store">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                        <div>
                            <label class="block text-sm">Nom</label>
                            <input type="text" wire:model.defer="NomPrenom" class="w-full border rounded px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm">Pays</label>
                            <input type="text" wire:model.defer="Pays" class="w-full border rounded px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm">Ville</label>
                            <input type="text" wire:model.defer="Ville" class="w-full border rounded px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm">Email</label>
                            <input type="email" wire:model.defer="Mail" class="w-full border rounded px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm">Téléphone</label>
                            <input type="text" wire:model.defer="Telephone" class="w-full border rounded px-3 py-2">
                        </div>


                    </div>

                    <div class="mt-6 flex justify-end space-x-2">
                        <button type="button" wire:click="closeModalClient" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Annuler</button>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    @if($showConfirmationModalClient)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded shadow-md">
                <h3 class="text-lg font-semibold">Confirmer la suppression</h3>
                <p>Êtes-vous sûr de vouloir supprimer cet client ?</p>
                <div class="mt-4 flex justify-end space-x-4">
                    <button wire:click="$set('showConfirmationModalClient', false)" class="bg-gray-300 text-gray-800 px-4 py-2 rounded">Annuler</button>
                    <button wire:click="delete" class="bg-red-500 text-white px-4 py-2 rounded">Confirmer</button>
                </div>
            </div>
        </div>
    @endif

    @if($showDetailClient)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-2xl shadow-xl p-6 w-full max-w-2xl">
                <h3 class="text-2xl font-bold text-gray-800 mb-4 border-b pb-2">Information du clients</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-gray-700">
                    <div>
                        <p class="font-semibold">Nom et Prenom :</p>
                        <p>{{ $selectedCmd->NomPrenom ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <p class="font-semibold">Pays :</p>
                        <p>{{ $selectedCmd->Pays ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <p class="font-semibold">Ville :</p>
                        <p>{{ $selectedCmd->Ville ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <p class="font-semibold">Téléphone :</p>
                        <p>{{ $selectedCmd->Telephone ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <p class="font-semibold">Mail :</p>
                        <p>{{ $selectedCmd->Mail ?? 'N/A' }}</p>
                    </div>

                </div>

                <div class="mt-6 flex justify-end">
                    <button wire:click="$set('showDetailClient', false)"
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
                        <th class="px-4 py-3 border-b">Nom et Prenom</th>
                        <th class="px-4 py-3 border-b">Pays</th>
                        <th class="px-4 py-3 border-b">Ville</th>
                        <th class="px-4 py-3 border-b">Email</th>
                        <th class="px-4 py-3 border-b">Téléphone</th>
                        <th class="px-4 py-3 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cmd ?? [] as $carte)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-3 border-b">{{ $carte->NomPrenom }}</td>
                            <td class="px-4 py-3 border-b">{{ $carte->Pays }}</td>
                            <td class="px-4 py-3 border-b">{{ $carte->Ville }}</td>
                            <td class="px-4 py-3 border-b">{{ $carte->Mail }}</td>
                            <td class="px-4 py-3 border-b">{{ $carte->Telephone }}</td>
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
            <span>Ajouter un client</span>
        </button>
    </div>

</div>
