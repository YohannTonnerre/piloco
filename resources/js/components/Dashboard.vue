<template>
  <section class="admin">
        <h1>DashBoard</h1>
        <p>name : {{user.name}}</p>
        <p>email : {{user.email}}</p>
        <button class="btn btn-danger" @click.prevent="logout">Logout</button>
         <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>mode</th>
                <th>phrase</th>
                <th>nombres gorgées</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="piloco in pilocos" :key="piloco.id">
                <td>{{ piloco.id }}</td>
                <td>{{ piloco.mode }}</td>
                <td>{{ piloco.name }}</td>
                <td>{{ piloco.verre }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'EditPicolo', params: { id: piloco.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deletePicolo(piloco.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <router-link :to="{name: 'NewPiloco'}">Nouveaux pilocos</router-link>
    </section>
</template>

<script>
export default {
    data(){
        return{
            user: { type: Object, default: () => ({}) },
            pilocos: []
        }
    },
    created() {
        
        axios.get('/api/dashboard')
            .then(response => {
                this.pilocos = response.data;
            });
    },

    methods:{
        logout(){
            axios.post('/api/logout').then(()=>{
                this.$router.push({ name: 'Home'})
            })
        },
        deletePicolo(id){
            axios.delete(`/api/otter/delete/${id}`)
                    .then(response => {
                        let i = this.otters.map(data => data.id).indexOf(id);
                        this.otters.splice(i, 1)
                    });
        }
    },
    mounted(){
        axios.get('/api/user').then((res)=>{
            this.user = res.data
        })
    }
}
</script>

<style>

</style>