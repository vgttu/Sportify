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
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" v-model="search">
                    </div>

                    <div class="search-results">
                        <ul>
                            <li v-for="training in results">
                                <h4>
                                    {{ training.name }}

                                    <span class="price" v-if="training.price">{{ training.price }} &euro; / {{ training.price_type.charAt(0).toUpperCase() + training.price_type.substr(1) }}</span>
                                    <span class="price" v-else>Ask a price</span>
                                </h4>
                                
                                <span class="club">{{ training.club.name }}</span>
                            </li>
                        </ul>
                    </div>
                </form>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">{{ search }}</a></li>
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
    export default {
        data() {
            return {
                search: '',
                results: []
            }
        },

        watch: {
            search(value) {
                this.searchClub();
            }
        },

        methods: {
            searchClub: _.debounce(
                function () {
                    if (this.search.length < 2) {
                        return;
                    }

                    axios.get('/api/trainings/search?search=' + this.search).then(response => {
                        this.results = response.data;
                    });

                    console.log('Searching');
                },
                500
            )
        }
    }
</script>
