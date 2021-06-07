<template>
  <section class="admin">
        <h1>DashBoard</h1>
        <p>name : {{user.name}}</p>
        <p>email : {{user.email}}</p>
        <button class="btn btn-danger" @click.prevent="logout">Logout</button>

        <br>
        <input :placeholder="'Chercher par '+ category" type="text" v-model="filter">
        <span v-if="filter && filteredList.length >= 1">
            {{filteredList.length}} phrase<span v-if="filteredList.length > 1">s</span> trouvée<span v-if="filteredList.length > 1">s</span>
        </span>
        <span v-if="filter && filteredList.length == 0">
            Aucune phrase trouvée
        </span>

        <select v-model="category" id="">
            <option value="" selected disabled hidden>Choose here</option>
            <option value="mode">mode</option>
            <option value="phrase">phrase</option>
        </select>

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
            <tr v-for="piloco in filteredList" :key="piloco.id">
                <td>{{ piloco.id }}</td>
                <td>{{ piloco.mode }}</td>
                <td>{{ piloco.name }}</td>
                <td>{{ piloco.verre }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'EditPiloco', params: { id: piloco.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deletePiloco(piloco.id)">Delete</button>
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
            pilocos: [],
            filter: '',
            category: ''
        }
    },
    created() {
        
        axios.get('/api/dashboard')
            .then(response => {
                this.pilocos = response.data;
            });
    },
    computed: {
        filteredList(){
            return this.pilocos.filter((piloco) => {
                if(this.category === 'mode'){
                    return piloco.mode.toLowerCase().includes(this.filter.toLowerCase());
                }
                if(this.category === 'phrase'){
                    return piloco.name.toLowerCase().includes(this.filter.toLowerCase());
                }
                else{
                     return piloco.name.toLowerCase().includes(this.filter.toLowerCase());
                }
            })
        },

    },

    methods:{
        logout(){
            axios.post('/api/logout').then(()=>{
                this.$router.push({ name: 'Home'})
            })
        },
        deletePiloco(id){
            axios.delete(`/api/piloco/delete/${id}`)
                    .then(response => {
                        let i = this.pilocos.map(data => data.id).indexOf(id);
                        this.pilocos.splice(i, 1)
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