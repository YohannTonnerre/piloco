<template>
    <div class="auth-container">
        <form @submit.prevent="updatePiloco">

            <div class="form-group">
                <label for="mode">mode</label>
                <input type="text" class="form-control" placeholder="mode" v-model="piloco.mode">
            </div>
            <div class="form-group">
                <label for="name">Phrase</label>
                <input type="text" class="form-control" placeholder="name" v-model="piloco.name">
            </div>
            <div class="form-group">
                <label for="verre">Nombre de gorgées</label>
                <input type="text" class="form-control" placeholder="verre" v-model="piloco.verre">
            </div> 
            <input type="submit" value="Creer la loutre" class="btn btn-primary"/>
        </form>
    </div>
</template>

<script>
export default {
    data(){
        return{
            
            piloco:{

            }
        }
        
    },
    
    methods: {
        
        updatePiloco(){
            axios.post(`/api/piloco/update/${this.$route.params.id}`, this.piloco).then(()=>{
                this.$router.push({name: 'Dashboard'});
            }).catch((error) => {
                this.errors = error.response.data.errors;
            })
        }
    },
    created(){
        axios.get(`/api/piloco/edit/${this.$route.params.id}`).then((res)=>{
            this.piloco = res.data
        })
    }
}
</script>

<style>

</style>