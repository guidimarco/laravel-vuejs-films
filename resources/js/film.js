import axios from 'axios';

var app = new Vue ({
    el: '#app',
    data: {
        getFilmUrl: 'http://127.0.0.1:8000/api/getFilm',
        filmSearch: '',
        errorMessage: '',
        filmFound: false,
        filmNotFound: false,
        searchedFilm: {
            'Title': '',
            'Year': '',
            'Director': ''
        }
    },
    methods: {
        searchFilms() {
            self = this
            axios.get(self.getFilmUrl, {
                params: {
                    title: self.filmSearch
                }
            }).then(function(data) {
                if (!data.data.success) self.errorMessage = 'Sorry there was a problem'
                else if (data.data.titleDetails.Response == 'False') {
                    self.errorMessage = 'The film was not found';
                    self.showFilmResult(false);
                } else {
                    self.searchedFilm.Title = data.data.titleDetails.Title;
                    self.searchedFilm.Year = data.data.titleDetails.Year;
                    self.searchedFilm.Director = data.data.titleDetails.Director;
                    self.showFilmResult(true);
                }
            });
        },
        showFilmResult(filmFound) {
            this.filmFound = this.filmNotFound = false;
            if (filmFound) this.filmFound = true;
            else this.filmNotFound = true;
        }
    },
    mounted() {

    }
});
