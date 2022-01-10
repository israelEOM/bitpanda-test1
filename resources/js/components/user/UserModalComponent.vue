<template>
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" v-if="user">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">User Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Citizenship Country</label>
                        <select class="form-select" v-model="user.detail.citizenship_country_id">
                            <option v-for="(country, key) in countries" :key="key"
                                :value="country.id">{{ country.name }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">First Name</label>
                        <input class="form-control" type="text" v-model="user.detail.first_name" placeholder="First Name">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Last Name</label>
                        <input class="form-control" type="text" v-model="user.detail.last_name" placeholder="Last Name">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Phone Number</label>
                        <input class="form-control" type="text" v-model="user.detail.phone_number" placeholder="Phone Number">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="handleUpdateDetails">Save changes</button>
                </div>
            </div>
        </div>
        </div>
</template>

<script>
import { bus } from '../../app';

export default {
    data() {
        return {
            user: null,
            countries: []
        }
    },

    mounted() {
        bus.$on('user', (data) => {
            this.user = data;
        });

        this.getCountries();
    },

    methods: {
        getCountries () {
            axios.get('countries')
            .then(res => {
                this.countries = res.data;
            })
            .catch(err => {
                console.error(err); 
            })
        },

        handleUpdateDetails () {
            axios.put(`/users/${this.user.detail.id}`, this.user.detail)
            .then(res => {
                if (res.data.success) {
                    this.$notify({
                        group: 'foo',
                        title: 'Success!',
                        text: res.data.message
                    });
                    $('#userModal').modal('toggle');
                }
            })
            .catch(err => {
                console.error(err); 
            })
        }
    },
}
</script>