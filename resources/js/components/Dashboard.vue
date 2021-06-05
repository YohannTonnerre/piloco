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
                <th>Titre</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="picolo in picolos" :key="picolo.id">
                <td>{{ picolo.id }}</td>
                <td>{{ picolo.name }}</td>
                <td>{{ picolo.verre }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'EditPicolo', params: { id: picolo.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deletePicolo(picolo.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <router-link :to="{name: 'NewOtter'}">Nouveaux picolos</router-link>
    </section>
</template>

<script>
export default {
    data(){
        return{
            user: { type: Object, default: () => ({}) },
            picolos: []
        }
    },
    created() {
        
        axios.get('/api/dashboard')
            .then(response => {
                this.picolos = response.data;
            });
    },

    methods:{
        logout(){
            axios.post('/api/logout').then(()=>{
                this.$router.push({ name: 'Accueil'})
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