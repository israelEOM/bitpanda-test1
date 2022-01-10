<template>
    <div class="container p-5">
        <div class="row d-flex justify-content-center mb-3">
            <div class=" mb-3 w-50">
                <label for="" class="form-label">Filter Options</label>
                <select class="form-select form-select-lg" v-model="selected" @change="getSelectedUsers">
                    <option v-for="(option, key) in selectOptions" :key="key"
                        :value="option">{{ option }}</option>
                </select>
            </div>
            
        </div>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">E-mail</th>
                    <th scope="col" width="150">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users" :key="user.id">
                    <th scope="row">{{ user.id }}</th>
                    <td>{{ user.detail ? user.detail.first_name : '' }}</td>
                    <td>{{ user.detail ? user.detail.last_name : '' }}</td>
                    <td>{{ user.email }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" @click="openModal(user)" :disabled="!user.detail">
                            <font-awesome-icon icon="edit" />
                        </button>
                        <button type="button" class="btn btn-danger" @click="deleteUser(user.id)" :disabled="user.detail">
                            <font-awesome-icon icon="trash-alt" />
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <UserModal />
        <notifications group="foo" />
    </div>
</template>

<script>
import UserModal from './UserModalComponent.vue';
import { bus } from '../../app';

export default {
    data() {
        return {
            users: [],
            selectOptions: ['All', 'Active Austrian'],
            selected: 'Active Austrian'
        };
    },

    components: {
        UserModal
    },

    mounted() {
        this.getUsers('austrian');
    },

    methods: {
        getUsers (param = '') {
            axios.get(`/users/${param}`)
            .then(res => {
                this.users = res.data;
                console.log(res.data)
            })
            .catch(err => {
                console.error(err); 
            })
        },

        deleteUser (user_id) {
            

            axios.delete(`/users/${user_id}`)
            .then(res => {
                this.users = this.users.filter(user => user.id !== user_id);
                
                if (res.data.success) {
                    this.$notify({
                        group: 'foo',
                        title: 'Success!',
                        text: res.data.message
                    });
                }
            })
            .catch(err => {
                console.error(err); 
            })
        },

        getSelectedUsers () {
            console.log('aqui', this.selected)
            if (this.selected == 'All') 
                this.getUsers();
            else
                this.getUsers('austrian');
        },

        openModal (user) {
            bus.$emit('user', user);
            $('#userModal').modal('show');
        },
    },
};
</script>
