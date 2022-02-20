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

                    <div>
                        <h2>Cerca un film</h2>
                        <div class="form-group">
                            <label>Cerca il film che vuoi guardare stasera</label>
                            <input v-model="filmTitle" id="filmTitle" type="text" class="form-control" placeholder="Inserisci il titolo" required>
                            <button class="btn btn-dark" @click="searchFilms">
                                Cerca film
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
