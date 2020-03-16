<template>
    <div class="container blobs">
        <div class="row justify-content-center text-center">
            <div class="col-md-8 mt-5">
                <h1>Get 3 free downloads!</h1>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-xl-8 col-lg-8 col-md-10 mb-3">
                <h6 class="text-muted">Start your <strong>7-day trial</strong> to access thousands of curated photos, fonts, graphics and more to deliver quality designs faster.</h6>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <form method="post" action="/submit" @submit.prevent="onSubmit" @keydown="errors.clear($event.target.name)" v-if="showForm">
                        <div class="card-body pb-2">
                            <h6 class="card-title text-center">Get <strong>3 free downloads</strong> when you start your free trial today.</h6>
                            <ul class="custom-bullet checkmark pb-2">
                                <li>Get access to our full Pro catalog</li>
                                <li>Cancel anytime, risk free</li>
                                <li>7 days free</li>
                            </ul>
                            <input type="email" class="form-control" id="email" name="email" v-model="email" placeholder="Enter your Email Address" required>
                            <small id="emailHelp" class="text-danger" v-if="errors.has('email')" v-text="errors.get('email')"></small> 
                        </div>
                        <div class="card-body text-center pb-0 pt-1">
                            <button type="submit" class="btn btn-primary text-center form-control trial-button" :disabled="errors.any()">Start your free trial</button>
                        </div>
                        <div class="card-body text-center">
                            <small class="text-muted sub-card-text">The free trial is for new members only. All assets downloaded during the free trial period are covered by a basic license.</small>
                        </div>
                    </form>
                    <div class="card-body text-center pb-0" v-if="!showForm">
                        <h6 class="card-title">Unfortunately, the free trial is for <strong>new members only</strong>. It looks like you already have a Creative Market account.</h6>
                    </div>
                    <div class="card-body text-center " v-if="!showForm">
                        <button @click="goToCatalog" class="btn btn-primary text-center form-control trial-button">Explore our catalog</button>
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
            },
            goToCatalog(){
                window.location.assign("https://creativemarket.com/tags/product-catalog");
            }
        }
        
    }
</script>
