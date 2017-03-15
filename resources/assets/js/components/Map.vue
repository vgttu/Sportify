<template>
	<div class="map-container">
	    <gmap-map
	    	:center="map.center"
	    	:zoom="map.zoom"
	    	:options="map.options"
	    >
	    	<google-cluster>
	    		<google-marker
					v-for="club in clubs"
					:position="{ lat: club.lat, lng: club.long }"
					:clickable="true"
					@click="selectClub(club)"
		        ></google-marker>
	    	</google-cluster>
			
			<div slot="visible">
	    		<div class="map-info" v-if="selected.club">
	    			<span class="w-close glyphicon glyphicon-remove" aria-hidden="true" @click="closeBox"></span>

	    			<div class="info-box">
	    				<h3>{{ selected.club.name }}</h3>
	    				<p class="address">{{ selected.club.address }}</p>
	    			</div>

    				<table class="table table-hover">
    					<thead>
	    					<tr>
	    						<th>#</th>
	    						<th>Name</th>
	    						<th>Price</th>
	    					</tr>
    					</thead>

    					<tbody>
    						<tr v-if="!selected.trainings">
    							<td colspan="3" style="text-align: center">Loading ...</td>
    						</tr>

    						<tr v-for="(training, index) in selected.trainings">
    							<td>{{ index + 1 }}</td>
    							<td>{{ training.name }}</td>
    							<td>
    								<span v-if="training.price">
    									{{ training.price }} &euro; / {{ training.price_type.charAt(0).toUpperCase() + training.price_type.substr(1) }}
    								</span>

    								<span v-else>Ask a price</span>
    							</td>
    						</tr>
    					</tbody>
    				</table>
					
					<div class="info-btn">
    					<a href="#" class="btn btn-default btn-visit">Visit homepage</a>
    				</div>
		    	</div>
	    	</div>
	    </gmap-map>
    </div>
</template>

<script>
	import { Marker, Cluster } from 'vue2-google-maps';

    export default {
    	data() {
    		return {
    			clubs: [],
    			selected: {
    				club: null,
    				trainings: [] 
    			},
    			map: {
	    			zoom: 11,
	    			center: {
	    				lat: 59.4474919,
	    				lng: 24.7135158
	    			},
	    			options: {
	    				scrollwheel: false,
	    				mapTypeControl: false,
	    				streetViewControl: false
	    			}
    			}
    		}
    	},

        mounted() {
            this.getClubs();

            this.$events.on('clubSelected', club => {
                this.selectClub(club);
            });
        },

        beforeDestroy() {
            this.$events.off('clubSelected');
        },

        methods: {
        	getClubs() {
        		axios.get('/api/clubs').then(response => {
        			this.clubs = response.data;
        		});
        	},

        	selectClub(club) {
        		this.selected.club = club;

        		this.map.zoom = 13;
        		this.map.center = {
        			lat: club.lat,
        			lng: club.long
        		};

        		axios.get('/api/clubs/' + club.id + '/trainings').then(response => {
        			this.selected.trainings = response.data;
        		});
        	},

        	closeBox() {
        		this.selected = {
        			club: null,
        			trainings: []
        		};
        	}
        },

        components: {
        	'google-marker': Marker,
        	'google-cluster': Cluster
        }
    }
</script>
