import axios from 'axios';

var app = new Vue ({
    el: '#app',
    data: {
        getFilmUrl: 'http://127.0.0.1:8000/api/getFilm',
        filmTitle: ''
    },
    methods: {
        searchFilms() {
            axios.get(this.getFilmUrl, {
                params: {
                    title: this.filmTitle
                }
            }).then(function(data) {
                console.log(data.data);
            });
        }
    },
    mounted() {

    }
});
