<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Http;

class TmdbApiService
{
    private string $baseUrl;
    private string $apiKey;

    public function __construct()
    {
        $this->baseUrl = 'https://api.themoviedb.org/3/';
        $this->apiKey = config('services.tmdb.api_key');
    }

    /**
     * Normalise les résultats de recherche pour inclure uniquement les films et les séries TV.
     *
     * Cette méthode filtre les résultats pour inclure uniquement les films et les séries TV,
     * puis ajoute un titre normalisé à chaque résultat et supprime les champs non utilisé.
     *
     * @param \Illuminate\Support\Collection|Collection $results Les résultats de la recherche à normaliser.
     * @return \Illuminate\Support\Collection|Collection Les résultats normalisés ou un message d'erreur.
     */
    private function normalizeBrowseResults(\Illuminate\Support\Collection|Collection $results, bool $person = false): \Illuminate\Support\Collection|Collection
    {
        if ($results->isNotEmpty()) {
            return $results->filter(function ($result) use ($person) {
                    if ($person) {
                        return in_array($result['media_type'], ['movie', 'tv']) && in_array($result['job'], ['Director', 'Creator']);
                    } else {
                        return in_array($result['media_type'], ['movie', 'tv']);
                    }
                })
                ->transform(function ($result) {
                    $result['normalized_title'] = $result['title'] ?? $result['name'];

                    unset($result['title'],
                        $result['name'],
                        $result['original_title'],
                        $result['original_name'],
                        $result['popularity'],
                        $result['vote_count'],
                        $result['vote_average'],
                        $result['adult'],
                        $result['video']);

                    if (!isset($result['release_date'])) {
                        $result['release_date'] = $result['first_air_date'];
                        unset($result['first_air_date']);
                    }

                    return $result;
                });
        } else {
            return collect();
        }
    }

    /**
     * Normalise les détails d'un élément (Films/Série),
     *
     * Cette méthode normalise les détails d'un élément en y ajoutant un titre normalisé,
     * en supprimant les champs non utilisés et en veillant à ce que la date de sortie soit correctement définie.
     *
     * @param array $result Les détails de l'élément à normaliser.
     * @return array|null Les détails normalisés ou null si aucun résultat n'est fourni.
     */
    private function normalizeMediaDetails(Array $result, String $type): ?Array
    {
        if ($result) {
            $result['normalized_title'] = $result['title'] ?? $result['name'];
            $result['media_type'] = $type;

            unset($result['title'],
                $result['name'],
                $result['original_title'],
                $result['original_name'],
                $result['popularity'],
                $result['vote_count'],
                $result['vote_average'],
                $result['adult'],
                $result['video'],
                $result['homepage'],
                $result['belongs_to_collection'],
                $result['imdb_id'],
                $result['revenue'],
                $result['budget'],
                $result['runtime'],
                $result['spoken_languages'],);

            if (!isset($result['release_date'])) {
                $result['release_date'] = $result['first_air_date'];
                unset($result['first_air_date']);
            }

            if (isset($result['credits']['cast'])) {
                $result['credits']['cast'] = collect($result['credits']['cast'])->take(10);
            }

            if (isset($result['credits']['crew']) && !array_key_exists('created_by', $result)) {
                $result['directors'] = collect($result['credits']['crew'])->filter(function ($crew) {
                    return $crew['job'] === 'Director';
                })->take(3);
            } else {
                $result['directors'] = collect($result['created_by'])->take(3);
                unset($result['created_by']);
            }

            return $result;
        }
    }

    /**
     * Fais une requête depuis une entrée utilisateur dans l'API TMDB et retourne les résultats.
     *
     * Cette méthode effectue une requête de recherche sur l'API TMDB et récupère les résultats
     * de toutes les pages disponibles. Elle fusionne les résultats dans une seule collection.
     *
     * @param string $query La requête de recherche.
     * @return \Illuminate\Support\Collection|Collection Les résultats de la recherche (après normalisation).
     */
    public function search(string $query): Collection|\Illuminate\Support\Collection
    {
        $results = collect(); // Collection vide pour stocker les résultats
        $page = 1; // Initialisation de la première page

        while ($page <= 10) {
            $request = Http::get($this->baseUrl . 'search/multi', [
                'query' => $query,
                'api_key' => $this->apiKey,
                'page' => $page,
            ])->json();

            if (empty($request['results'])) {
                break; // Si la réponse ne contient plus de résultats, on arrête la boucle
            }

            $results = $results->merge($request['results']); // Ajoute les résultats à la collection
            $page++; // Passe à la page suivante
        }

        // On retourne les résultats fusionnés et normalisés
        return $this->normalizeBrowseResults($results);
    }

    public function show(int $id, string $type): array
    {
        $request = Http::get($this->baseUrl . $type . '/' . $id, [
            'api_key' => $this->apiKey,
            'append_to_response' => 'credits',
            'language' => 'fr-FR',
        ])->json();

        if(isset($request['status_code'])) {
            throw new \Exception('Désolé, nous n\'avons aucun film ou série correspondant', 404);
        }

        return $this->normalizeMediaDetails($request, $type);
    }

    public function person(int $id)
    {
        $results = collect();

        $request = Http::get($this->baseUrl . 'person/' . $id . '/combined_credits', [
            'api_key' => $this->apiKey,
            'language' => 'fr-FR',
        ])->json();

        $results = $results->merge($request['crew']);

        return $this->normalizeBrowseResults($results, true);
    }
}
