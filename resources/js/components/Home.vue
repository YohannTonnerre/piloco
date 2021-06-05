<template>
    <section class="home-container">
        <h1>Piloco</h1>
        
        <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#FFDB91" fill-opacity="1" d="M0,96L60,128C120,160,240,224,360,250.7C480,277,600,267,720,218.7C840,171,960,85,1080,48C1200,11,1320,21,1380,26.7L1440,32L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
        </svg>
        <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#EFBE5B" fill-opacity="1" d="M0,128L60,128C120,128,240,128,360,112C480,96,600,64,720,48C840,32,960,32,1080,53.3C1200,75,1320,117,1380,138.7L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
        </svg>

        <router-link class="jouer-link" to="/test">
            Jouer
        </router-link>
       
    </section>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
