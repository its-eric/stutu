<template>
    <md-card md-with-hover>
        <md-ripple>
            <md-card-header>
            <div class="md-title">Dashboard</div>
            <div class="md-subhead">It also has a ripple</div>
            </md-card-header>

            <md-card-content>Display user info here
            </md-card-content>

            <md-card-actions>
                <md-button><router-link :to="{ name: 'tutors'}">Browse tutors</router-link></md-button>
                <md-button><router-link :to="{ name: 'user/:id/courses'}">See your courses</router-link></md-button>
                <md-button><router-link :to="{ name: 'courses' }">Browse courses</router-link></md-button>
            </md-card-actions>
        </md-ripple>
    </md-card>
</template>
<script>
export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
