@extends('layouts.dashboard')

@section('script')
<script src="{{ asset('js/film.js') }}" defer></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="title my-2">
                    <h1>Ciao {{ Auth::user()->name }}</h1>
                    <div>
                        <p>Ecco i tuoi dati:</p>
                    </div>

                    <ul>
                        <li class="d-block">
                            Creato il: {{ date_format(Auth::user()->created_at, 'D d/m/Y') }}
                        </li>
                        <li class="d-block">
                            E-mail: {{ Auth::user()->email }}
                        </li>
                    </ul>

                    <h2>Cerca il film che vuoi guardare stasera</h2>
                    <div class="input-group mb-3 form-group">
                        <input v-model="filmSearch" id="filmSearch" type="text" class="form-control input-group-prepend" placeholder="Inserisci il titolo" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" @click="searchFilms">Cerca</button>
                        </div>
                    </div>
                    <div>
                        <div id="filmSearched" v-bind:class="{'d-none': !filmFound}">
                            <form id="saveFilm" action="{{ route('dashboard.film.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group w-50 d-inline-block">
                                    <label>Titolo</label>
                                    <input type="text" name="title" class="form-control" v-model="searchedFilm.Title" required readonly>
                                    <label>Anno di realizzazione</label>
                                    <input type="text" name="year" class="form-control" v-model="searchedFilm.Year" required readonly>
                                    <label>Regista</label>
                                    <input type="text" name="director" class="form-control" v-model="searchedFilm.Director" required readonly>
                                </div>

                                <div class="mt-2">
                                    <div class="d-inline-block form-group">
                                        <button type="submit" class="btn btn-outline-secondary">
                                            Salva
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <p id="filmNotFound" v-bind:class="{'d-none': !filmNotFound}">@{{ errorMessage }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
