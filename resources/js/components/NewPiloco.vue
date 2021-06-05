<template>
    <div class="auth-container">
        <form @submit.prevent="pushPiloco">
            <p v-for="error in errors" :key="error">
                {{error}}
            </p>
            <div class="form-group">
                <label for="mode">mode</label>
                <input type="text" class="form-control" placeholder="mode" v-model="form.mode">
            </div>
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control" placeholder="name" v-model="form.name">
            </div>
            <div class="form-group">
                <label for="verre">verre</label>
                <input type="text" class="form-control" placeholder="verre" v-model="form.verre">
            </div> 
            <input type="submit" value="Creer la loutre" class="btn btn-primary"/>
        </form>
    </div>
</template>

<script>
export default {
    data(){
        return{
            
            user: {
                type: Object, default: () => ({}) 
            },
            
            form:{
                mode:'',
                name:'' ,
                verre:''

            },
            errors:[]
        }
        
    },
    
    methods: {
        
        pushPiloco(){
            axios.post('/api/piloco/add',this.form).then(()=>{
                this.$router.push({name: 'Dashboard'});
            }).catch((error) => {
                this.errors = error.response.data.errors;
            })
        }
    },
    created(){
        axios.get('/api/user').then((res)=>{
            this.user = res.data
        })
    }
}
</script>

<style>

</style>