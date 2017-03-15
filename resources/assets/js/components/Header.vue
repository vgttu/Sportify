<template>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="#">
                    <img alt="Sportify" src="/img/logo.png">
                </a>
            </div>
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form class="navbar-form navbar-left" v-on-clickaway="searchAway">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter a name of training or club" v-model="keyword" @focus="searchIn">
                    </div>

                    <div class="search-results" v-if="search.show">
                        <ul>
                            <li v-if="!search.loading && search.results.length == 0" class="disabled">We didn't find any result for "{{ search.query }}".</li>
                            <li v-if="search.loading" class="disabled">Loading ...</li>

                            <li v-for="training in search.results" @click="searchSelect(training)">
                                <h4>
                                    {{ training.name }}

                                    <span class="price" v-if="training.price">{{ training.price }} &euro; / {{ training.price_type.charAt(0).toUpperCase() + training.price_type.substr(1) }}</span>
                                    <span class="price" v-else>Ask a price</span>
                                </h4>
                                
                                <span class="club">{{ training.club.name }}</span>
                            </li>
                        </ul>

                        <div class="algolia">
                            Powered by
                            <img src="/img/Algolia_logo_bg-white.svg" alt="Algolia">
                        </div>
                    </div>
                </form>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    import { mixin as clickaway } from 'vue-clickaway';

    export default {
        data() {
            return {
                keyword: '',
                search: {
                    query: '',
                    results: [],
                    loading: false,
                    show: false
                }
            }
        },

        watch: {
            keyword(value) {
                this.searchClub();
            }
        },

        methods: {
            searchClub: _.debounce(
                function () {
                    this.search.query = this.keyword;

                    if (this.search.query.length < 2) {
                        this.search.show = false;
                        this.search.results = [];

                        return;
                    }

                    this.search.show = true;
                    this.search.loading = true;
                    this.search.results = [];

                    axios.get('/api/trainings/search?search=' + this.search.query).then(response => {
                        this.search.loading = false;
                        this.search.results = response.data;
                    });
                },
                500
            ),

            searchSelect(training) {
                this.search.show = false;

                this.$events.emit('clubSelected', training.club);
            },

            searchAway() {
                this.search.show = false;
            },

            searchIn() {
                if (this.search.query.length > 0) {
                    this.search.show = true;
                }
            }
        },

        mixins: [clickaway]
    }
</script>
