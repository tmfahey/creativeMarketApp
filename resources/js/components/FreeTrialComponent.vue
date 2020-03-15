<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body" v-if="showForm">
                        <h5 class="card-title">Get <strong>3 free downloads</strong> when you start your free trial today.</h5>
                        <form method="post" action="/submit" @submit.prevent="onSubmit" >
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" v-model="email" placeholder="name@example.com" >
                            </div>
                            <button type="submit" class="btn btn-primary text-uppercase">Start your free trial</button>
                        </form>
                    </div>
                    <div class="card-body" v-if="!showForm">
                        <h5 class="card-title">Unfortunately, the free trial is for <strong>new members only</strong>. It looks like you already have a Creative Market account.</h5>
                        <button type="submit" class="btn btn-primary text-uppercase">Explore our catalog</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default { 
        data() {
            return {
                email: '',
                showForm: true
            }
        },
        methods: {
            onSubmit() {
                axios.post('/submitForm', this.$data)
                    .then(this.onSuccess)
                    .catch();
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
