<template>
    <div>
        <h3 class="text-center">All Clients</h3><br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>FirstName</th>
                <th>LastName</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="client in clients" :key="client.id">
                <td>{{ client.id }}</td>
                <td>{{ client.firstname }}</td>
                <td>{{ client.lastname }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                clients: []
            }
        },
        created() {
            this.axios
                .get('http://a6k.test/api/test')
                .then(response => {
                    this.clients = response.data;
                });
        }
    }
</script>