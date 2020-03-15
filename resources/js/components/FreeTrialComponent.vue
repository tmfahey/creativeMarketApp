<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body" v-if="showForm">
                        <h5 class="card-title">Get <strong>3 free downloads</strong> when you start your free trial today.</h5>
                        <form method="post" action="/submit" @submit.prevent="onSubmit" @keydown="errors.clear($event.target.name)">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" v-model="email" placeholder="name@example.com" >
                                <small id="emailHelp" class="text-danger" v-if="errors.has('email')" v-text="errors.get('email')"></small> 
                            </div>
                            <button type="submit" class="btn btn-primary text-uppercase" :disabled="errors.any()">Start your free trial</button>
                        </form>
                    </div>
                    <div class="card-body" v-if="!showForm">
                        <h5 class="card-title">Unfortunately, the free trial is for <strong>new members only</strong>. It looks like you already have a Creative Market account.</h5>
                        <button type="submit" class="btn btn-primary text-uppercase" :disabled="errors.any()">Explore our catalog</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    class Errors {
        constructor(){
            this.errors = {}
        }
        get(field){
            if(this.errors[field]){
                return this.errors[field][0];
            }
        }
        has(field){
            return this.errors.hasOwnProperty(field);
        }
        set(errors){
            this.errors = errors;
        }
        clear(field){
            delete this.errors[field];
        }
        any(){
            return Object.keys(this.errors).length > 0;
        }
    }
    export default { 
        data() {
            return {
                email: '',
                errors: new Errors(),
                showForm: true
            }
        },
        methods: {
            onSubmit() {
                axios.post('/submitForm', this.$data)
                    .then(this.onSuccess)
                    .catch(error => this.errors.set(error.response.data.errors));
            },
            onSuccess(response){
                if(response.data['emailExists']){
                    this.showForm = false;
                }else{
                    window.location.assign("https://creativemarket.com/sign-up");
                }
            }
        }
        
    }
</script>
