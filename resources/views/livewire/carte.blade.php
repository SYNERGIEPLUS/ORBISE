<div class="bg-white p-4 rounded shadow">
    <h3 class="text-lg font-semibold mb-4">Cartes</h3>

    <div class="space-y-4">
        <!-- Table à gauche -->
        <div class="table-auto w-full border border-gray-300 rounded-md shadow-sm overflow-x-auto">
            <table class="table-auto w-full text-sm">
                <thead>
                    <tr class="bg-gray-600 text-white text-left">
                        <th class="px-4 py-3 border-b">ID Carte</th>
                        <th class="px-4 py-3 border-b">ID Commande</th>
                        <th class="px-4 py-3 border-b">Type de carte</th>
                        <th class="px-4 py-3 border-b">Nature Carte</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartes ?? [] as $carte)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-3 border-b">{{ $carte->id }}</td>
                            <td class="px-4 py-3 border-b">{{ $carte->id_comm }}</td>
                            <td class="px-4 py-3 border-b">
                                @php
                                    $caracteristiques = $carte->commande->Caracteristique ?? [];

                                    if (is_string($caracteristiques)) {
                                        $caracteristiques = json_decode($caracteristiques, true);
                                    }
                                @endphp

                                @foreach($caracteristiques as $item)
                                    <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full mr-1">
                                        {{ $item }}
                                    </span>
                                @endforeach
                            </td>
                            <td class="px-4 py-3 border-b">{{ $carte->commande->NatureCarte }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

</div>
