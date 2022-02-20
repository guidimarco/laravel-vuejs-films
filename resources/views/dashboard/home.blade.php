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
                            <ul>
                                <li>Title: @{{ searchedFilm.Title }} (@{{ searchedFilm.Year }})</li>
                                <li>Director: @{{ searchedFilm.Director }}</li>
                            </ul>
                        </div>
                        <p id="filmNotFound" v-bind:class="{'d-none': !filmNotFound}">@{{ errorMessage }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
